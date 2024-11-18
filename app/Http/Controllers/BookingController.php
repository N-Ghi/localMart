<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\GoogleService;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //Booking Functions
    public function createBooking(Request $request, GoogleService $googleCalendarService)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        // Prepare data for the booking record
        $bookingData = [
            'service_id' => $request->service_id,
            'booked_by' => Auth::id(),
            'booked_time' => Carbon::now(),
            'status' => 'pending',
        ];

        // Create the booking record and get the associated service via the relationship
        $booking = Booking::create($bookingData);
        $service = $booking->service; // Access the related service using the relationship

        // Prepare data for the calendar event
        $summary = $service->name;
        $description = $service->description;
        $startDate = new \DateTime($service->start_date); // Ensure these are DateTime objects if required
        $endDate = new \DateTime($service->end_date);
        $attendeesEmails = [auth()->user()->email];

        // Call the createCalendarEvent method on the GoogleCalendarService
        $googleCalendarService->createCalendarEvent
        (
            $summary,
            $description,
            $startDate,
            $endDate,
            $attendeesEmails,
            $booking->booked_by
        );

        return redirect('/')->with('success', 'Your booking has been created and added to the calendar.');
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
