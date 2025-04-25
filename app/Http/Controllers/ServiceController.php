<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    /**
     * Affiche la liste des services
     */
    public function index()
    {
        $services = Service::all();
        $categories = ServiceCategory::all();
        
        return view('services.index', compact('services', 'categories'));
    }
    
    /**
     * Affiche les détails d'un service spécifique
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $relatedServices = Service::where('category_id', $service->category_id)
                                 ->where('id', '!=', $service->id)
                                 ->take(3)
                                 ->get();
        
        return view('services.show', compact('service', 'relatedServices'));
    }
}
