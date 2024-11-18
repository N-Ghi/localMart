<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class travellerController extends Controller
{
    public function index()
    {
        //Upcoming bookings
        $adventures = Booking::where('booked_by', auth()->id())
        ->whereHas('service', function($query) {
            $query->where('start_date', '>', now());
        })
        ->with('service')
        ->orderBy('booked_time', 'asc')
        ->count();

        $pastAdventures = Booking::where('booked_by', auth()->id())
        ->whereHas('service', function($query) {
            $query->where('start_date', '<', now());
        })
        ->with('service')
        ->orderBy('booked_time', 'asc')
        ->count();

        // Get the top 2 most booked services
        $services = Booking::select('service_id', \DB::raw('count(*) as occurrences'))
        ->groupBy('service_id')             // Group by service ID to get count per service
        ->orderBy('occurrences', 'desc')     // Order by number of occurrences
        ->with('service') 
        ->limit(2)                   // Eager load service to get service name
        ->get();

        return view('Traveller.Dashboard', compact('services', 'adventures', 'pastAdventures'));
    }

    public function futureAdventures(){
        $userId = auth()->id();
    $adventures = Booking::where('booked_by', $userId)
        ->whereHas('service', function ($query) {
            $query->where('end_date', '>', now());
        })
        ->with('service')
        ->paginate(10);
        
        return view('upcomingAdventures', compact('adventures'));
    }

    public function pastAdventures(){
        $user = auth()->user()->id;
        $adventures = Booking::where('booked_by', $user)
        ->with('service')
        ->whereHas('service', function($query) {
            $query->where('end_date', '<', now());
        })
        ->paginate(10);
        return view('pastAdventures', compact('adventures'));
    }
}
