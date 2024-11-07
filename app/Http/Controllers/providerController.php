<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class providerController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $totalServices = Service::where('owner_id', $userId)->count();
        $totalBookings = Booking::whereHas('service', function ($query) use ($userId) {
            $query->where('owner_id', $userId);
        })->count();

        // Query the bookings table, joining services and filtering by the logged-in user
        $popularServices = Booking::select('service_id', \DB::raw('count(*) as occurrences'))
            ->whereHas('service', function ($query) use ($userId) {
                $query->where('owner_id', $userId); // Filter services by the logged-in user
            })
            ->groupBy('service_id')             // Group by service ID to get count per service
            ->orderBy('occurrences', 'desc')     // Order by number of occurrences
            ->with('service') 
            ->limit(3)                   // Eager load service to get service name
            ->get();

            $recentBookings = Booking::whereHas('service', function ($query) use ($userId) {
                $query->where('owner_id', $userId);
            })->orderBy('created_at', 'desc')->limit(5)->get();
        
        return view('Providor.Dashboard', compact('popularServices', 'totalServices', 'totalBookings', 'recentBookings'));
    }
    

}
