<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gebruiker;

class GebruikerSearchController extends Controller
{
	//12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
    public function GebruikerSearch(){
    	$gebruiker = Gebruiker::all();

    	return view('gebruikersearch.search', compact('gebruiker'));  	
    }
    
}
