<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product; // Modèle à créer pour les produits

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Récupère tous les produits
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }
}
