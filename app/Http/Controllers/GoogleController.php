<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\GoogleService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class GoogleController extends Controller
{
    protected $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }

    // public function createEvent(Request $request)
    // {
    //     $eventDetails = $request->validate([
    //         'summary' => 'required|string',
    //         'description' => 'required|string',
    //         'start_datetime' => 'required|date',
    //         'end_datetime' => 'required|date',
    //         'attendees' => 'required|array',
    //         'group_id' => 'required|string',
    //     ]);

    //     $event = $this->googleService->createCalendarEvent(
    //         $eventDetails['summary'],
    //         $eventDetails['description'],
    //         $eventDetails['start_datetime'],
    //         $eventDetails['end_datetime'],
    //         $eventDetails['attendees'],
    //         $eventDetails['group_id']
    //     );

    //     return response()->json(['event' => $event]);
    // }

    public function sendConfirmationEmail($userEmail)
    {
        $token = $this->generateConfirmationToken($userEmail);
        $confirmUrl = route('confirmEmail', ['token' => $token]);
        $html = view('emails.confirmation', compact('confirmUrl'))->render();
        
        $this->googleService->sendEmail($userEmail, 'Email Confirmation', $html);
    }
    public function sendBookingEmail($userEmail)
    {
        $html = view('emails.booked', compact('confirmUrl'))->render();
        
        $this->googleService->sendEmail($userEmail, 'Booking Confirmation', $html);
    }

    public function generateConfirmationToken($email)
    {
        return Crypt::encryptString($email);
    }

    public function confirm_token($token)
    {
        try {
            $email = Crypt::decryptString($token);
            return $email;
        } catch (DecryptException $e) {
            return false;
        }
    }
    
    public function confirmEmail ($token) {

        $email = $this->confirm_token($token);
    
        if (!$email) {
            return redirect()->route('resendConfirmation')->with('error', 'The confirmation link is invalid or has expired.');
        }
    
        $user = User::where('email', $email)->firstOrFail();
        
        if ($user->confirmed) {
            return redirect()->route('login')->with('success', 'Account already confirmed.');
        }
    
        $user->confirmed = true;
        $user->save();
    
        return redirect()->route('login')->with('success', 'Your account has been confirmed.');
    }
}
