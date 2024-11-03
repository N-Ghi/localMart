<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class travellerController extends Controller
{
    public function index()
    {
        return view('Traveller.Dashboard');
    }
}
