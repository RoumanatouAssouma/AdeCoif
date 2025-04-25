<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation; // Modèle à créer pour les réservations

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all(); // Récupère toutes les réservations
        return view('admin.reservation.index', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservation.create');
    }

    public function store(Request $request)
    {
        Reservation::create($request->all());
        return redirect()->route('admin.reservation.index');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('admin.reservation.index');
    }

    public function destroy($id)
    {
        Reservation::destroy($id);
        return redirect()->route('admin.reservation.index');
    }
}

