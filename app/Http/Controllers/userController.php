<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function traveller()
    {
        return view('Traveller.register');
    }

    public function provider()
    {
        return view('Providor.register');
    }

    public function storeProvider(Request $request)
    {
        $incoming = $request->validate([
            'name'=> ['required', 'min:3', 'max:20'],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'min:8', 'confirmed']
        ]);
        $incoming['password'] = bcrypt($incoming['password']);

        $user = User::create($incoming);
        $user->assignRole('provider');
        return redirect('/')->with('success', 'Your business has been registered, please login to continue');
    }
    public function storeTraveller(Request $request)
    {
        $incoming = $request->validate([
            'name'=> ['required', 'min:3', 'max:20'],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'min:8', 'confirmed']
        ]);
        $incoming['password'] = bcrypt($incoming['password']);

        $user = User::create($incoming);
        $user->assignRole('traveller');
        return redirect('/')->with('success', 'Login to start your adventures');
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginusername'=> 'required',
            'loginpassword'=> 'required'
        ]);
        if (auth()->attempt(['name'=>$incomingFields['loginusername'], 'password'=>$incomingFields['loginpassword']])){
            $request->session()->regenerate();

            if (auth()->user()->hasRole(['admin'])){
                return redirect()->route('adminDashboard')->with('success', 'Login Success');
            }
            elseif (auth()->user()->hasRole(['provider'])){
                return redirect()->route('providorDashboard')->with('success', 'Login Success');
            }
            elseif (auth()->user()->hasRole(['traveller'])){
                return redirect()->route('travellerDashboard')->with('success', 'Login Success');
            }
            else{
                return redirect()->route('dashboard')->with('error', 'An error occured, please try again');
            }
        }
        else{
            return redirect('/')->with('error', 'Invalid login. Please try again.');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'You have been logged out');
    }
}
