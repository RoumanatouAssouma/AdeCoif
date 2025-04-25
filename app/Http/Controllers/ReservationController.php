<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Affiche le formulaire de réservation
     */
    public function index(Request $request)
    {
        $services = Service::all();
        $selectedService = null;
        
        // Si un service est spécifié dans l'URL
        if ($request->has('service')) {
            $selectedService = Service::where('slug', $request->service)->first();
        }
        
        // Générer les créneaux horaires disponibles
        $timeSlots = $this->generateTimeSlots();
        
        return view('reservation', compact('services', 'selectedService', 'timeSlots'));
    }
    
    /**
     * Traite la soumission du formulaire de réservation
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'notes' => 'nullable|string',
        ]);
        
        // Créer la réservation
        $reservation = new Reservation();
        $reservation->name = $validated['name'];
        $reservation->email = $validated['email'];
        $reservation->phone = $validated['phone'];
        $reservation->service_id = $validated['service_id'];
        
        // Combiner la date et l'heure
        $dateTime = Carbon::parse($validated['date'] . ' ' . $validated['time']);
        $reservation->appointment_time = $dateTime;
        
        $reservation->notes = $validated['notes'] ?? null;
        $reservation->status = 'pending'; // Par défaut, la réservation est en attente
        $reservation->save();
        
        // Rediriger avec un message de succès
        return redirect()->route('reservation')
                         ->with('success', 'Votre réservation a été enregistrée avec succès. Nous vous contacterons pour confirmation.');
    }
    
    /**
     * Génère les créneaux horaires disponibles
     */
    private function generateTimeSlots()
    {
        $timeSlots = [];
        $startTime = Carbon::createFromTime(8, 0, 0); // 8h00
        $endTime = Carbon::createFromTime(19, 0, 0);  // 19h00
        $interval = 60; // 60 minutes
        
        while ($startTime->lt($endTime)) {
            $timeSlots[] = $startTime->format('H:i');
            $startTime->addMinutes($interval);
        }
        
        return $timeSlots;
    }
}
