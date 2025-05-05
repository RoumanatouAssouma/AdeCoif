<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Log; // pour utiliser Log::error


class ContactController extends Controller
{
    /**
     * Affiche le formulaire de contact
     */
    public function index()
    {
        return view('contact');
    }
    
    /**
     * Traite la soumission du formulaire de contact
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        // Enregistrer le message de contact
        $contact = new Contact();
        $contact->name = $validated['name'];
        $contact->email = $validated['email'];
        $contact->phone = $validated['phone'] ?? null;
        $contact->subject = $validated['subject'];
        $contact->message = $validated['message'];
        $contact->save();
        
        // Envoyer un email de notification (si configuré)
        try {
            Mail::to(config('mail.admin_email', 'assoumaroumanatou08@gmail.com'))
                ->send(new ContactFormSubmitted($contact));
        } catch (\Exception $e) {
            Log::error('Erreur envoi email : ' . $e->getMessage());
        }
        
        
        // Rediriger avec un message de succès
        return redirect()->route('contact')
                         ->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
    }
}
