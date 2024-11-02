<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        Log::info('Validation Complete', $request->all());

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
}
