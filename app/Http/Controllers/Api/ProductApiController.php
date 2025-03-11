<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Renvoie une liste paginée des produits disponibles (API)
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
        
        $products = $query->orderBy('created_at', 'desc')->paginate(15);
        
        return new ProductCollection($products);
    }
    
    /**
     * Renvoie les détails d'un produit spécifique (API)
     */
    public function show(Product $product)
    {
        return new ProductResource($product->load(['category', 'farmer.user', 'media']));
    }
}