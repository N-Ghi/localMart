<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //Booking Functions
    public function createBooking(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);
    
        $bookingData = [
            'service_id' => $request->service_id,
            'booked_by' => Auth::id(),
            'booked_time' => Carbon::now(),
            'status' => 'pending',
        ];

        $booking = Booking::create($bookingData);

        return redirect()->route('showBookings')->with('success', 'Booking created successfully');
    }

    public function showBookings()
    {
        if (auth()->user()->hasRole('admin')){
            $bookings = Booking::with('service')->paginate(10);
        }
        elseif (auth()->user()->hasRole('traveller')){
            $bookings = Booking::where('booked_by', auth()->user()->id)->get();
        }
        return view('showBookings', ['bookings' => $bookings]);
    }

    public function destroyBooking($booking)
    {
        $booking = Booking::findOrFail($booking);
        $booking->delete();
        return redirect()->route('showServices')->with('success', 'Service deleted successfully');
    }

    public function showMyBookings()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view your bookings.');
        }

        // Assuming 'owns' returns a collection of services
        $serviceIds = $user->owns()->pluck('id'); // Get an array of service IDs

        // Retrieve bookings for all services owned by the user
        $bookings = Booking::whereIn('service_id', $serviceIds)->paginate(10);

        return view('viewAllBookings', ['bookings' => $bookings]);
    }
}
