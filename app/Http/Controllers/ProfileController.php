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
use App\Http\Controllers\SanitizeController;

class ProfileController extends Controller
{
    protected $sanitizeController;

    public function __construct(SanitizeController $sanitizeController)
    {
        $this->sanitizeController = $sanitizeController; // Dependency injection
    }

    // Profile Functions
    public function showProfiles()
    {
        $profiles = Profile::with('owner')->paginate(10);
        return view('Admin.showProfiles', ['profiles' => $profiles]);
    }

    public function showProfile(Profile $profile)
    {
        $output = $this->sanitizeController->decodeSocials($profile); // Call the method
        return view('Admin.showProfile', ['profile' => $profile, 'output' => $output]);
    }

    public function createProfile()
    {
        $providers = User::role('provider')->get();
        return view('Admin.storeProfile', compact('providers'));
    }

    public function storeProfile(Request $request)
    {
        $validatedData = $request->validate([
            'business_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|min:10|max:12',
            'payment_info' => 'required|string|max:10',
            'business_hours_open' => 'required|date_format:H:i',
            'business_hours_close' => 'required|date_format:H:i',
            'about' => 'required|string',
            'social_media' => 'required|json',
            'owner_id' => 'required|exists:users,id',
        ]);

        // Sanitize input directly using SanitizeController
        foreach ($validatedData as $key => $value) {
            $validatedData[$key] = strip_tags($value);
        }

        $validatedData['social_media'] = $this->sanitizeController->sanitizeJson($validatedData['social_media']); // Call the method

        // Ensure closing time is after opening time
        if (strtotime($validatedData['business_hours_close']) <= strtotime($validatedData['business_hours_open'])) {
            return redirect()->back()->withErrors(['business_hours_close' => 'Closing time must be after opening time']);
        }

        $profile = Profile::create($validatedData);

        // Redirect with a success message
        return redirect()->route('showProfiles')->with('success', 'Profile created successfully!');
    }

    public function editProfile(Profile $profile)
    {
        $providers = User::role('provider')->get();
        return view('Admin.editProfile', compact('profile', 'providers'));
    }

    public function updateProfile(Profile $profile, Request $request)
    {
        $validatedData = $request->validate([
            'business_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|min:10|max:12',
            'payment_info' => 'required|string|max:10',
            'business_hours_open' => 'required|date_format:H:i',
            'business_hours_close' => 'required|date_format:H:i',
            'about' => 'required|string',
            'social_media' => 'required|json',
            'owner_id' => 'required|exists:users,id',
        ]);

        // Sanitize input directly using SanitizeController
        foreach ($validatedData as $key => $value) {
            $validatedData[$key] = strip_tags($value);
        }

        $validatedData['social_media'] = $this->sanitizeController->sanitizeJson($validatedData['social_media']); // Call the method

        if (strtotime($validatedData['business_hours_close']) <= strtotime($validatedData['business_hours_open'])) {
            return redirect()->back()->withErrors(['business_hours_close' => 'Closing time must be after opening time']);
        }

        $profile->update($validatedData);

        return redirect()->route('showProfiles')->with('success', 'Profile updated successfully');
    }

    public function destroyProfile($profileId)
    {
        $profile = Profile::findOrFail($profileId);
        $profile->delete();
        return redirect()->route('showProfiles')->with('success', 'Profile deleted successfully');
    }
}
