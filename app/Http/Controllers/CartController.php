<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        // Ici, tu pourrais ajouter le produit à la session du panier
        $cart = session()->get('cart', []);

        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }
}
