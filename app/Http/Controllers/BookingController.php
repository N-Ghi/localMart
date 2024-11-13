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

        if(auth()->user()->hasRole('admin')){
            return redirect()->route('adminDashboard')->with('success', 'Service deleted successfully');
        }
        elseif(auth()->user()->hasRole('traveller')){
            return redirect()->route('travellerDashboard')->with('success', 'Service deleted successfully');
        }
        
    }

    public function showMyBooking(Booking $booking)
    {
        return view('viewBooking', ['booking' => $booking]);
    }

    
}
