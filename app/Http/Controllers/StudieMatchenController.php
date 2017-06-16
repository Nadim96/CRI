<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cohort;
use App\Klas;
use App\Opleiding;
use App\Student;
use App\Beroepsprofiel;
use App\Studie;
use Session;


class StudieMatchenController extends Controller
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
        $klassen = Klas::all();
        $opleidingen = Opleiding::all();
        $studenten = Student::all();
        $beroepsprofielen = Beroepsprofiel::all();
        $studenten = Student::all();

        $studies = Studie::all();
        return view('Studie.index', compact('cohorts', 'klassen', 'opleidingen', 'studenten', 'beroepsprofielen', 'studies', 'studenten'));
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

        $studies = new Studie;
        $studies->cohort_id              = $request->cohort_id;
        $studies->klas_id                = $request->klas_id;
        $studies->opleiding_id           = $request->opleiding_id;
        $studies->student_id             = $request->student_id;
        $studies->beroepsprofiel_id      = $request->beroepsprofiel_id;

        $studies->save();


        return redirect()->route('Studie.index');
        
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
