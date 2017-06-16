<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    //12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    ///De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }

    public function index()
    {
        $fulltable = \App\Coach::all();
        return view('search.search',compact('fulltable'));
    }
    public function search(Request $request)
    {
        if ($request->ajax())
        {
            $output="";
            //$sex="";
            $customers=DB::table('coach')->where('coachnaam','LIKE','%'.$request->search. '%')
                                             /*->orWhere('bpvdocentcode','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek1','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek2','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek3','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek4','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek5','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek6','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek7','LIKE','%'.$request->search. '%')*/
                                             //->take(10)
                                             ->get();
            if ($customers)//
            {
            foreach($customers as $customer) {

                $output.='<tr>'.
                '<td>'.$customer->coachnaam.'</td>'.
                /*'<td>'.$customer->bpvdocentcode.'</td>'.
                '<td>'.$customer->bezoek1.'</td>'.
                '<td>'.$customer->bezoek2.'</td>'.
                '<td>'.$customer->bezoek3.'</td>'.
                '<td>'.$customer->bezoek4.'</td>'.
                '<td>'.$customer->bezoek5.'</td>'.
                '<td>'.$customer->bezoek6.'</td>'.
                '<td>'.$customer->bezoek7.'</td>'.*/
                '</tr>';
            }
                return Response($output);  
            }
        }
    }
}


