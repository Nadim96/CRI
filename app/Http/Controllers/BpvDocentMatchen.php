<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BPVDocent;
use App\Student;

class BpvDocentMatchen extends Controller
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
        $student = Student::all();
        $bpvdocent = BPVDocent::all();

        return view('DocentMatchen.index', compact('student'), compact('bpvdocent'));
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
            'naam' => 'required',
            'woonplaats' => 'required',
            'coach' => 'required',
            'opleiding' => 'required',
            'klas' => 'required',
            'beroepsprofiel' => 'required',
            'bpvdocent_id' => 'required'

        ));

        $student = new Student;
        $student->naam              = $request->naam;
        $student->woonplaats        = $request->woonplaats;
        $student->coach             = $request->coach;
        $student->opleiding         = $request->opleiding;
        $student->klas              = $request->klas;
        $student->beroepsprofiel    = $request->beroepsprofiel;
        $student->bedrijfs_id        = $request->bedrijfs_id;
        $student->bpvdocent_id       = $request->bpvdocent_id;
        $student->save();


        return redirect()->route('DocentMatchen.index');
        
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
