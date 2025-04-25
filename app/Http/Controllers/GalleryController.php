<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    /**
     * Affiche la galerie d'images
     */
    public function index(Request $request)
    {
        $categories = GalleryCategory::all();

        $query = GalleryImage::query();

        // Filtrer par catégorie si spécifiée
        if ($request->has('category')) {
            $category = GalleryCategory::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        $galleryImages = $query->orderBy('created_at', 'desc')
                              ->paginate(12);

        return view('gallery', compact('galleryImages', 'categories'));
    }
}
