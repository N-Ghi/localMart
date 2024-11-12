<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class travellerController extends Controller
{
    public function index()
    {
        //Upcoming bookings
        $adventures = Booking::where('booked_by', auth()->id())
        ->where('booked_time', '>', now())
        ->with('service')
        ->orderBy('booked_time', 'asc')
        ->limit(4)
        ->get();
        // Get the top 2 most booked services
        $services = Booking::select('service_id', \DB::raw('count(*) as occurrences'))
        ->groupBy('service_id')             // Group by service ID to get count per service
        ->orderBy('occurrences', 'desc')     // Order by number of occurrences
        ->with('service') 
        ->limit(2)                   // Eager load service to get service name
        ->get();

        return view('Traveller.Dashboard', compact('services', 'adventures'));
    }
}
