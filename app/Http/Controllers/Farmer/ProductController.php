<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Affiche la liste des produits d'un agriculteur
     */
    public function index(Request $request)
    {
        $farmer = auth()->user()->farmer;
        $products = Product::where('farmer_id', $farmer->id)
            ->with(['category', 'media'])
            ->when($request->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($request->category_id, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        return view('farmer.products.index', compact('products'));
    }
    
    /**
     * Affiche le formulaire de création d'un produit
     */
    public function create()
    {
        $categories = Category::all();
        return view('farmer.products.create', compact('categories'));
    }
    
    /**
     * Enregistre un nouveau produit
     */
    public function store(ProductStoreRequest $request)
    {
        $farmer = auth()->user()->farmer;
        
        $product = Product::create([
            'farmer_id' => $farmer->id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'unit_type' => $request->unit_type,
            'available_quantity' => $request->available_quantity,
            'min_order_quantity' => $request->min_order_quantity,
            'harvest_date' => $request->harvest_date,
            'expiration_date' => $request->expiration_date,
            'is_organic' => $request->has('is_organic'),
            'certifications' => $request->certifications,
            'status' => 'active',
        ]);
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)
                    ->toMediaCollection('product_images');
            }
        }
        
        return redirect()->route('farmer.products.index')
            ->with('success', 'Produit créé avec succès.');
    }
    
    /**
     * Affiche les détails d'un produit
     */
    public function show(Product $product)
    {
        $this->authorize('view', $product);
        
        $product->load(['category', 'farmer.user', 'media']);
        $priceHistory = $product->priceHistory;
        
        return view('farmer.products.show', compact('product', 'priceHistory'));
    }
    
    /**
     * Affiche le formulaire d'édition d'un produit
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        
        $categories = Category::all();
        return view('farmer.products.edit', compact('product', 'categories'));
    }
    
    /**
     * Met à jour un produit existant
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->authorize('update', $product);
        
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'unit_type' => $request->unit_type,
            'available_quantity' => $request->available_quantity,
            'min_order_quantity' => $request->min_order_quantity,
            'harvest_date' => $request->harvest_date,
            'expiration_date' => $request->expiration_date,
            'is_organic' => $request->has('is_organic'),
            'certifications' => $request->certifications,
            'status' => $request->status,
        ]);
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)
                    ->toMediaCollection('product_images');
            }
        }
        
        return redirect()->route('farmer.products.show', $product)
            ->with('success', 'Produit mis à jour avec succès.');
    }
    
    /**
     * Supprime (désactive) un produit
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        
        // Soft delete ou vérifier s'il n'y a pas de commandes en cours
        $product->update(['status' => 'inactive']);
        
        return redirect()->route('farmer.products.index')
            ->with('success', 'Produit désactivé avec succès.');
    }
}