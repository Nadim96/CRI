<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klas;
use Session;

class KlasController extends Controller
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
        $klassen = Klas::all();
        return view('Klas.index', compact('klassen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Klas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $klassen = $request->all();
        Klas::create($request->all());
        //11-05-2017 Lars: Als de gegevens succesvol zijn opgeslagen dan komt er een melding en de gebruiker wordt terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('Klas')->with('message', 'Klas is succesvol aangemaakt!');
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
        $klassen = Klas::find($id);
        return view('Klas.edit', compact('klassen'));
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
        Klas::find($request->all());
        $klassen = Klas::find($id);
        $KlasUpdate = $request->all();
        $klassen->update($KlasUpdate);
        return redirect('Klas')->with('message', 'Klas is succesvol gewijzigd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klassen = Klas::find($id);
        //11-05-2017 Lars: BPV-Bedrijf wordt gverwijderd door middel van zijn id
        $klassen->delete();
        //11-05-2017 Lars: Na het succesvol verwijderen word je terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('Klas')->with('message', 'Klas is succesvol verwijderd!');
    }
}
