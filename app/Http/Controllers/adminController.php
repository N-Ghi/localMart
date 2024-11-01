<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

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
            'role' => ['required', Rule::in(['admin', 'provider', 'traveller'])],
        ]);

        $userData['password'] = bcrypt($userData['password']);
            
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => $userData['password'],
        ]);

        $role = Role::where('name', $userData['role'])->first();

        if (!$role) {
            return redirect()->back()->with('error', 'The specified role does not exist.');
        }
        
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

    /**
     * Show the form for editing the specified resource.
     */
    public function editUser(User $user)
    {
        return view('Admin.editUser', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, User $user)
    {
        $data = $request->validate([
            'name'=> ['required', 'min:3', 'max:20'],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'min:8'],
            'role' => ['required', Rule::in(['admin', 'provider', 'traveller'])]
        ]);
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        $user->syncRoles([$data->role]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect()->route('showUsers')->with('success', 'User deleted successfully');
    }
}
