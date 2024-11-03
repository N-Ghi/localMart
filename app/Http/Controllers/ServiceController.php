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

class ServiceController extends Controller
{
    // Service Functions
    public function showServices()
    {
        $services = Service::all();
        return view('Admin.viewServices', ['services' => $services]);
    }
    public function showService(Service $service)
    {

        return view('Admin.viewService', ['service' => $service]);
    }
    public function createService()
    {
        $providers = User::role('provider')->get();
        return view('Admin.createService', ['providers' => $providers]);
    }
    public function storeService(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'start_time' => 'required|date_format:H:i',
            'finish_time' => 'required|date_format:H:i',
            'owner_id' => 'required|exists:users,id',
        ]);

        if (strtotime($validatedData['finish_time']) <= strtotime($validatedData['start_time'])) {
            return redirect()->back()->withErrors(['finish_time' => 'Finish time must be after start time']);
        }

        $validatedData['name'] = strip_tags($validatedData['name']);
        $validatedData['description'] = strip_tags($validatedData['description']);
        $validatedData['price'] = strip_tags($validatedData['price']);

        $service = Service::create($validatedData);

        return redirect()->route('showServices')->with('success', 'Service created successfully');
    }
    public function editService(Service $service)
    {
        $providers = User::role('provider')->get();
        return view('Admin.editService', ['service' => $service, 'providers' => $providers]);
    }
    public function updateService(Service $service, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'start_time' => 'required|date_format:H:i',
            'finish_time' => 'required|date_format:H:i',
            'owner_id' => 'required|exists:users,id',
        ]);

        if (strtotime($validatedData['finish_time']) <= strtotime($validatedData['start_time'])) {
            return redirect()->back()->withErrors(['finish_time' => 'Finish time must be after start time']);
        }

        $validatedData['name'] = strip_tags($validatedData['name']);
        $validatedData['description'] = strip_tags($validatedData['description']);
        $validatedData['price'] = strip_tags($validatedData['price']);

        $service->update($validatedData);

        return redirect()->route('showServices')->with('success', 'Service updated successfully');
    }
    public function destroyService($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->delete();
        return redirect()->route('showServices')->with('success', 'Service deleted successfully');
    }
}