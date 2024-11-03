<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class providerController extends Controller
{
    public function index()
    {
        return view('Providor.Dashboard');
    }

}
