<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service; // Modèle à créer pour les services

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // Récupère tous les services
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        Service::create($request->all());
        return redirect()->route('admin.services.index');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return redirect()->route('admin.services.index');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->route('admin.services.index');
    }
}

