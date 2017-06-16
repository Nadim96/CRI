<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bezoeken;

class BezoekenBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Nadim
        $docentid = Auth::id();
        $bezoekenfromdocentid = \App\Bezoeken_Student_Docent::where('bpvdocent_id', $docentid)->get();
        $items = \App\Bezoeken::all();
        return view('BezoekenBeheer.index', compact('bezoekenfromdocentid', 'items'));
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
        $bezoeken = Bezoeken::find($id);
        return view('BezoekenBeheer.edit', compact('bezoeken'));
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
        $bezoeken = Bezoeken::find($id);
        $bezoekUpdate = $request->all();
        $bezoeken->update($bezoekUpdate);
        return redirect('bezoekenbeheer')->with('message', 'Bezoek is succesvol gewijzigd!');
    }


    public function updatebezoek(Request $request)
    {
        $bezoekId = $request->bezoek;
        $bezoeken = Bezoeken::find($request->id);
        $bezoeken->$bezoekId = $request->value;
        $bezoeken->save();
        return redirect('bezoekenbeheer');
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
