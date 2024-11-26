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

class PaymentController extends Controller
{
     //Payment Functions
    public function createPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $booking = Booking::find($request->booking_id);

        $paymentData = [
            'booking_id' => $request->booking_id,
            'price' => $booking->service->price,
            'payment_time' => Carbon::now(),
            'status' => 'paid',
        ];
        $payment = Payment::create($paymentData);

        $booking->status = 'paid';
        $booking->save();

        return redirect()->route('showMyBooking', $payment->booking_id)->with('success', 'Payment created successfully');
    }
}
