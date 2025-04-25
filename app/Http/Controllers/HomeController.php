<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\GalleryImage;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil
     */
    public function index()
    {
        // Récupérer les services mis en avant
        $featuredServices = Service::where('is_featured', true)
                                  ->take(3)
                                  ->get();
        
        // Récupérer les témoignages
        $testimonials = Testimonial::where('is_approved', true)
                                  ->orderBy('created_at', 'desc')
                                  ->take(3)
                                  ->get();
        
        // Récupérer les images de la galerie pour la section galerie
        $galleryImages = GalleryImage::orderBy('created_at', 'desc')
                                    ->take(6)
                                    ->get();
        
        // Récupérer les produits en vedette pour la section boutique
        $featuredProducts = Product::where('is_featured', true)
                                  ->take(4)
                                  ->get();
        
        return view('home', compact(
            'featuredServices',
            'testimonials',
            'galleryImages',
            'featuredProducts'
        ));
    }
}
