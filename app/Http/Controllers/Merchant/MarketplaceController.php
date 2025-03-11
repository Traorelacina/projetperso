<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Http\Requests\OrderStoreRequest;

class MarketplaceController extends Controller
{
    /**
     * Affiche la liste des produits disponibles sur le marché
     */
    public function index(Request $request)
    {
        $query = Product::with(['category', 'farmer.user', 'media'])
            ->available();
            
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        
        if ($request->filled('region_id')) {
            $query->whereHas('farmer.user', function ($q) use ($request) {
                $q->where('region_id', $request->region_id);
            });
        }
        
        if ($request->filled('is_organic')) {
            $query->where('is_organic', true);
        }
        
        if ($request->filled('min_price')) {
            $query->where('unit_price', '>=', $request->min_price);
        }
        
        if ($request->filled('max_price')) {
            $query->where('unit_price', '<=', $request->max_price);
        }
        
        $products = $query->orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::all();
        $regions = Region::all();
        
        return view('merchant.marketplace.index', compact('products', 'categories', 'regions'));
    }
    
    /**
     * Affiche les détails d'un produit
     */
    public function show(Product $product)
    {
        $product->load(['category', 'farmer.user', 'media']);
        
        $similarProducts = Product::with(['category', 'media'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->available()
            ->limit(4)
            ->get();
            
        $farmerProducts = Product::with(['category', 'media'])
            ->where('farmer_id', $product->farmer_id)
            ->where('id', '!=', $product->id)
            ->available()
            ->limit(4)
            ->get();
            
        return view('merchant.marketplace.show', compact('product', 'similarProducts', 'farmerProducts'));
    }
    
    /**
     * Affiche le formulaire de paiement
     */
    public function checkout(Request $request)
    {
        $productIds = $request->product_ids;
        $quantities = $request->quantities;
        
        $products = Product::whereIn('id', $productIds)->get();
        
        $items = [];
        foreach ($products as $index => $product) {
            $items[] = [
                'product' => $product,
                'quantity' => $quantities[$index],
                'total' => $product->unit_price * $quantities[$index]
            ];
        }
        
        return view('merchant.marketplace.checkout', compact('items'));
    }
    
    /**
     * Traite une nouvelle commande
     */
    public function order(OrderStoreRequest $request, PaymentService $paymentService)
    {
        $merchant = auth()->user()->merchant;
        
        // Créer la commande
        $order = Order::create([
            'merchant_id' => $merchant->id,
            'total_amount' => $request->total_amount,
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $request->payment_method,
            'delivery_address' => $request->delivery_address,
            'delivery_date' => $request->delivery_date,
            'notes' => $request->notes,
        ]);
        
        // Créer les éléments de commande
        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'farmer_id' => $product->farmer_id,
                'quantity' => $item['quantity'],
                'unit_price' => $product->unit_price,
                'total_price' => $product->unit_price * $item['quantity'],
                'status' => 'pending',
            ]);
            
            // Mise à jour de la quantité disponible
            $product->decrement('available_quantity', $item['quantity']);
        }
        
        // Traiter le paiement
        $paymentResult = $paymentService->processPayment(
            $order,
            $request->payment_method,
            $request->total_amount
        );
        
        if ($paymentResult['success']) {
            $order->update([
                'payment_status' => 'paid',
                'transaction_reference' => $paymentResult['transaction_id']
            ]);
            
            return redirect()->route('merchant.orders.show', $order)
                ->with('success', 'Commande passée avec succès.');
        } else {
            return redirect()->route('merchant.orders.show', $order)
                ->with('warning', 'Commande créée mais paiement en attente.');
        }
    }
}