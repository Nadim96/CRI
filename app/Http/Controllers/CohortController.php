<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cohort;

class CohortController extends Controller
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
        $cohorts = Cohort::all();
        return view('Cohort.index', compact('cohorts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cohort.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cohorts = $request->all();
        Cohort::create($request->all());
        //11-05-2017 Lars: Als de gegevens succesvol zijn opgeslagen dan komt er een melding en de gebruiker wordt terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('Cohort')->with('message', 'Cohort is succesvol aangemaakt!');
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
        $cohorts = Cohort::find($id);
        return view('Cohort.edit', compact('cohorts'));
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
        Cohort::find($request->all());
        $cohorts = Cohort::find($id);
        $CohortUpdate = $request->all();
        $cohorts->update($CohortUpdate);
        return redirect('Cohort')->with('message', 'Cohort is succesvol gewijzigd!');
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
