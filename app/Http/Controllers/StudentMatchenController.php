<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BPVBedrijf;
use App\BPVDocent;
use App\Student;
use App\Opleiding;

use Session;

class StudentMatchenController extends Controller
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

    /*public function __construct(){
            // Lars: alleen ingelogd user kunnen deze pagina zien
            $this->middleware('auth');
        }
        */

    public function index()
    {
        $student = Student::all();
        $bpvdocent = BPVDocent::all();
        $bpvbedrijf = BpvBedrijf::all();
        $opleiding = Opleiding::all();

        return view('BedrijfMatchen.index', compact('student', 'bpvdocent', 'bpvbedrijf', 'opleiding'));
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
            'klas' => 'required',
            'beroepsprofiel' => 'required'
            

        ));

        $student = new Student;
        $student->naam              = $request->naam;
        $student->woonplaats        = $request->woonplaats;
        $student->coach             = $request->coach;
        $student->opleiding_id      = $request->opleiding_id;
        $student->klas              = $request->klas;
        $student->beroepsprofiel    = $request->beroepsprofiel;
        $student->bedrijfs_id       = $request->bedrijfs_id;
        $student->bpvdocent_id      = $request->bpvdocent_id;
        $student->save();


        return redirect()->route('student.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
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
