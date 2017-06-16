<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsControllerBpvDocent extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function index()
    {
        return view('MapsBpvDocent.index');
    }
}
