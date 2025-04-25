<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Affiche les détails d'un produit
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        $relatedProducts = Product::where('category_id', $product->category_id)
                                 ->where('id', '!=', $product->id)
                                 ->take(4)
                                 ->get();
        
        return view('shop.show', compact('product', 'relatedProducts'));
    }
}
