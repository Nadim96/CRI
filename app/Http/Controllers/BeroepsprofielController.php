<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beroepsprofiel;

class BeroepsprofielController extends Controller
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
        $beroepsprofielen = Beroepsprofiel::all();
        return view('Beroepsprofiel.index', compact('beroepsprofielen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Beroepsprofiel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beroepsprofielen = $request->all();
        Beroepsprofiel::create($request->all());
        return redirect('Beroepsprofiel')->with('message', 'Beroepsprofiel is succesvol aangemaakt!');

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
        $beroepsprofielen = Beroepsprofiel::find($id);
        return view('Beroepsprofiel.edit' , compact('beroepsprofielen'));
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
        Beroepsprofiel::find($request->all());
        $beroepsprofielen = Beroepsprofiel::find($id);
        $beroepsprofielenUpdate = $request->all();
        $beroepsprofielen->update($beroepsprofielenUpdate);
        return redirect('Beroepsprofiel')->with('message', 'Beroepsprofiel is succesvol gewijzigd!');
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
