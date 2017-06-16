<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CoordinatorLoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest:coordinator'); //10-05-2017 Lars: Redirect iedereen bijhalve de coördinator
	}

    public function index(){
        return view('Beheer'); //10-05-2017 Lars: Stuurt de coördinator-login pagina door naar de view
    }

    public function showLoginForm(){
    	return view('auth.co-login'); //10-05-2017 Lars: Stuurt de coördinator-login pagina door naar de view
    }

    public function login(Request $request){
    	//10-05-2017 Lars: Valideerd de form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    		]);
    		//10-05-2017 Lars: Login gegevens worden gecontroleerd en automastisch gehased
    		//10-05-2017 Lars: Auth::('coördinator') betekend dat alleen een coördinator inlogd kan worden op deze inlog formulier
    	if (Auth::guard('coordinator')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
    		//10-05-2017 Lars: Als het voltooid is redirect de coördinator naar de gekozen locatie
    		return redirect()->intended(route('co.dashboard')); //10-05-2017 Lars: Als de coördinator succesvol is ingelogd stuur de coördinator naar de co.dashboard pagina
    	}
    		//10-05-2017 Lars: Als het niet voltooid is redirect de gebruiker naar de login pagina
    		return redirect()->back()->withInput($request->only('email', 'remember')); 
    		//10-05-2017 Lars: De back function stuurt de geruiker met de verkeerde gegevens terug naar de pagina waar ze vandaan kwamen.
    		//10-05-2017 Lars: De withInput($request->only('email', 'remember') zorgt ervoor als ze een verkeede email invullen terug worden gestuurd.	

    }
} //10-05-2017 Lars: Einde van de class CoördinatorLoginController
