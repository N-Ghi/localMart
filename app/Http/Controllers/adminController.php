<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function createUser()
    {
        $role = Role::all();
        return view('Admin.createUser', ['role'=>$role]);
    }

    public function storeUser(Request $request)
    {

        $userData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8'],
            'role' => [
                'required',
                Rule::in(['admin', 'provider', 'traveller']),
                'exists:roles,name'
                ],
            ], [
                'role.in' => 'The selected role is invalid.',
                'role.exists' => 'The specified role does not exist in the system.'
        ]);

        $userData['password'] = bcrypt($userData['password']);

        
        $user = User::create($userData);

        $role = Role::where('name', $userData['role'])->first();
        $user->assignRole($role);

        return redirect()->route('adminDashboard')->with('success', 'User created successfully');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('Admin.viewUsers', ['users' => $users]);
    }

    public function showUser($user)
    {

        $user = User::find($user);
        return view('Admin.viewUser', ['user' => $user]);
    }

    public function editUser(User $user)
    {
        $role = Role::all();
        return view('Admin.editUser', ['user' => $user, 'role'=>$role]);
    }

    public function updateUser(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['min:8'],
            'role' => ['required', Rule::in(['admin', 'provider', 'traveller'])]
        ]);

        $data['password'] = bcrypt($data['password']);

        $user->update($data);

        $user->syncRoles([$data['role']]);

        return redirect()->route('showUsers')->with('success', 'User updated successfully');
    }

    public function destroyUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect()->route('showUsers')->with('success', 'User deleted successfully');
    }

    public function showProfiles()
    {
        $profiles = Profile::with('owner')->paginate(10);
        return view('Admin.showProfiles', ['profiles'=>$profiles]);
    }

    public function showProfile(Profile $profile)
    {
        $output = $this->decodeSocials($profile);
        return view('Admin.showProfile', ['profile'=>$profile, 'output' => $output]);
    }

    public function createProfile()
    {
        $providers = User::role('provider')->get();
        return view('Admin.storeProfile', compact('providers'));
    }

    public function storeProfile(Request $request)
    {
        // Validate the incoming request data
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

        // Sanitize the input data to prevent XSS attacks
        $validatedData['business_type'] = strip_tags($validatedData['business_type']);
        $validatedData['location'] = strip_tags($validatedData['location']);
        $validatedData['phone_number'] = strip_tags($validatedData['phone_number']);
        $validatedData['payment_info'] = strip_tags($validatedData['payment_info']);
        $validatedData['about'] = strip_tags($validatedData['about']);
        $validatedData['social_media'] = strip_tags($validatedData['social_media']);

        $validatedData['social_media'] = $this->sanitizeJson($validatedData['social_media']);

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
        return view('Admin.editProfile', compact('profile', 'profile', 'providers', 'providers'));
    }

    public function updateProfile(Profile $profile, Request $request){

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

        $validatedData['business_type'] = strip_tags($validatedData['business_type']);
        $validatedData['location'] = strip_tags($validatedData['location']);
        $validatedData['phone_number'] = strip_tags($validatedData['phone_number']);
        $validatedData['payment_info'] = strip_tags($validatedData['payment_info']);
        $validatedData['about'] = strip_tags($validatedData['about']);
        $validatedData['social_media'] = strip_tags($validatedData['social_media']);

        $validatedData['social_media'] = $this->sanitizeJson($validatedData['social_media']);

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
    private function decodeSocials($profile)
    {
        $jsondata = $profile->social_media;
        $data = json_decode($jsondata, true);

        $output = '';
        foreach ($data as $socialMedia => $link) {
            // Choose icon based on the social media name
            $icon = '';
            switch ($socialMedia) {
                case 'instagram':
                    $icon = '<i class="fab fa-instagram"></i>';
                    break;
                case 'facebook':
                    $icon = '<i class="fa-brands fa-facebook"></i>';
                    break;
                case 'twitter':
                    $icon = '<i class="fab fa-twitter"></i>';
                    break;
                default:
                    $icon = '<i class="fas fa-link"></i>';
                    break;
            }
    
            // Create the link with the icon
            $output .= '<a href="' . $link . '" target="_blank">' . $icon . ' ' . ucfirst($socialMedia) . '</a><br>';
        }
        return $output;
    }
    private function sanitizeJson($jsonString)
    {
        $data = json_decode($jsonString, true);
        if (is_array($data)) {
            array_walk_recursive($data, function (&$value) {
                $value = strip_tags($value);
            });
            return json_encode($data);
        }
        return $jsonString;
    }
}
