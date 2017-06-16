<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsControllerCoordinator extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }

    public function index()
    {
        return view('MapsCoordinator.index');
    }
}
