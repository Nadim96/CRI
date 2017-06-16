<?php

namespace App\Http\Controllers;

use App\BPVBedrijf;
use Illuminate\Http\Request;
use App\Http\Requests\BpvBedrijfRequest;    

class BpvBedrijfController extends Controller
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
        //11-05-2017 Lars: Maak een variabele aan die de model BpvBedrijf pakt en alle gegevens uit de BpvBedrijf migration, die de records naar de resources/views/BpvBedrijf/index.blade.php brengt doormiddel van een compact functionaliteit  
        $bpv_bedrijven = BPVBedrijf::orderBy('id', 'desc')->get(); 
        return view('BpvBedrijf.index', compact('bpv_bedrijven'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BpvBedrijf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //11-05-2017 Lars: Hier word een request gedaan van de BPV-Bedrijf gegevens
        $bpv_bedrijven = $request->all();
        BPVBedrijf::create($request->all());
        //11-05-2017 Lars: Als de gegevens succesvol zijn opgeslagen dan komt er een melding en de gebruiker wordt terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('BPV-Bedrijf')->with('message', 'BPV-Bedrijf is succesvol aangemaakt!');
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
    //12-05-2017 Lars: Deze functionaliteit zoekt naar de gekozen id en stuurt de id nr mee in de URL
     $bpv_bedrijven = BPVBedrijf::find($id);
     return view('BpvBedrijf.edit', compact('bpv_bedrijven'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BpvBedrijfRequest $request, $id)
    {
        //11-05-2017 Lars: Eerst wordt er gekenen o de gegeven (request) compleet zijn
        BPVBedrijf::find($request->all());
        //11-05-2017: Lars: Dan wordt er gezocht aan de hand van de BPV-Bedrijfs id
        $bpv_bedrijven = BPVBedrijf::find($id);
        //11-05-2017: Lars: Dan wordt er een request gedaan van alle gegevens van de gekozen id
        $bpvUpdate = $request->all();
        //11-05-2017: Lars: Met de update functie worden de gekozen gegevens geupdate
        $bpv_bedrijven->update($bpvUpdate);
        //11-05-2017: Lars: Als de update is voltooid word de gebruiker terug gestuurd naar de BPF-Bedrijf pagina
        return redirect('BPV-Bedrijf')->with('message', 'BPV-Bedrijf is succesvol gewijzigd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //11-05-2017 Lars: BPV-Bedrijf wordt gevonden door middel van zijn id
        $bpv_bedrijven = BPVBedrijf::find($id);
        //11-05-2017 Lars: BPV-Bedrijf wordt gverwijderd door middel van zijn id
        $bpv_bedrijven->delete();
        //11-05-2017 Lars: Na het succesvol verwijderen word je terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('BPV-Bedrijf')->with('message', 'BPV-Bedrijf is succesvol verwijderd!');
    }
}
