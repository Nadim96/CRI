<?php

namespace App\Http\Controllers;

use App\Opleiding;
use Illuminate\Http\Request;

class OpleidingController extends Controller
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
        return view('Opleiding.index', compact('opleidingen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Opleiding.create', compact('opleidingen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $opleidingen = $request->all();
        Opleiding::create($request->all());
        return redirect('Opleiding')->with('message', 'Opleiding is succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opleiding  $opleiding
     * @return \Illuminate\Http\Response
     */
    public function show(Opleiding $opleiding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opleiding  $opleiding
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opleidingen = Opleiding::find($id);
        return view('Opleiding.edit', compact('opleidingen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opleiding  $opleiding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opleiding $opleiding, $id)
    {
        Opleiding::find($request->all());
        $opleidingen = Opleiding::find($id);
        $OpleidingUpdate = $request->all();
        $opleidingen->update($OpleidingUpdate);
        return redirect('Opleiding')->with('message', 'Opleiding is succesvol gewijzigd!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opleiding  $opleiding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opleiding $opleiding)
    {
        //
    }
}
