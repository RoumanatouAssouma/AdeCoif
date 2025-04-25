<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Product;
use App\Models\BlogPost;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord administrateur
     */
    public function index()
    {
        // Statistiques pour le tableau de bord
        $stats = [
            'reservations_count' => Reservation::count(),
            'pending_reservations' => Reservation::where('status', 'pending')->count(),
            'today_reservations' => Reservation::whereDate('appointment_time', Carbon::today())->count(),
            'unread_messages' => Contact::where('is_read', false)->count(),
            'services_count' => Service::count(),
            'products_count' => Product::count(),
            'blog_posts_count' => BlogPost::count(),
        ];
        
        // Réservations récentes
        $recentReservations = Reservation::with('service')
                                       ->orderBy('created_at', 'desc')
                                       ->take(5)
                                       ->get();
        
        // Messages récents
        $recentMessages = Contact::where('is_read', false)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
        
        return view('admin.dashboard', compact('stats', 'recentReservations', 'recentMessages'));
    }
}
