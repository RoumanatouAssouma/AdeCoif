<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ShopController extends Controller
{
    /**
     * Affiche la boutique
     */
    public function index(Request $request)
    {
        $categories = ProductCategory::all();
        
        $query = Product::query();
        
        // Tri des produits
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price-low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'popular':
                    $query->orderBy('reviews_count', 'desc');
                    break;
                case 'newest':
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }
        
        $products = $query->paginate(12);
        
        return view('shop.index', compact('products', 'categories'));
    }
    
    /**
     * Affiche les produits d'une catégorie spécifique
     */
    public function category($slug, Request $request)
    {
        $categories = ProductCategory::all();
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
        
        $query = Product::where('category_id', $category->id);
        
        // Tri des produits
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price-low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'popular':
                    $query->orderBy('reviews_count', 'desc');
                    break;
                case 'newest':
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }
        
        $products = $query->paginate(12);
        
        return view('shop.index', compact('products', 'categories', 'category'));
    }
}
