<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opleiding;
use App\Klas;
use App\OpleidingKlas;

class OpleidingKlasController extends Controller
{
    //12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opleidingen = Opleiding::all();
        $klassen = Klas::all();
        $opleidingklas = OpleidingKlas::all();

        return view('OpleidingKlas.index', compact('opleidingen' , 'klassen', 'opleidingklas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
        ));

        $opleidingklas = new OpleidingKlas;
        $opleidingklas->opleiding_id        = $request->opleiding_id;
        $opleidingklas->klas_id             = $request->klas_id;
        $opleidingklas->save();

        return redirect()->route('OpleidingKlas.index')->with('message', 'Opleiding is succesvol gematched met een klas');;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
