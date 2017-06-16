<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest; 
use App\Student;
use Illuminate\Http\Request;
use Session;



class StudentController extends Controller
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
        $studenten = Student::all(); 
        return view('Student.index', compact('studenten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studenten = $request->all();
        Student::create($request->all());
        //11-05-2017 Lars: Als de gegevens succesvol zijn opgeslagen dan komt er een melding en de gebruiker wordt terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('Student')->with('message', 'Student is succesvol aangemaakt!');
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
        $studenten = Student::find($id);
        return view('Student.edit', compact('studenten'));
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
        Student::find($request->all());
        $studenten = Student::find($id);
        $StudentUpdate = $request->all();
        $studenten->update($StudentUpdate);
        return redirect('Student')->with('message', 'Student is succesvol gewijzigd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studenten = Student::find($id);
        //11-05-2017 Lars: BPV-Bedrijf wordt verwijderd door middel van zijn id
        $studenten->delete();
        //11-05-2017 Lars: Na het succesvol verwijderen word je terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('Student')->with('message', 'Student is succesvol verwijderd!');;
    }
}
