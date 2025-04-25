<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryImage; // Modèle à créer pour la galerie

class AdminGalleryController extends Controller
{
    public function index()
    {
        $galleries = GalleryImage::all(); // Récupère toutes les galeries
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        GalleryImage::create([
            'image' => $imageName,
        ]);

        return redirect()->route('admin.gallery.index');
    }

    public function edit($id)
    {
        $gallery = GalleryImage::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = GalleryImage::findOrFail($id);
        $gallery->update($request->all());
        return redirect()->route('admin.gallery.index');
    }

    public function destroy($id)
    {
        GalleryImage::destroy($id);
        return redirect()->route('admin.gallery.index');
    }
}
