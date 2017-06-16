<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\BPVDocent;
use App\Cohort;
use App\Bezoeken;
use App\Bezoeken_Student_Docent;

class BpvdocentStudentController extends Controller
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
        $studenten          = Student::all();
        $bpvdocenten        = BPVDocent::all();
        $cohorts            = Cohort::all();
        $bpvdocentstudent   = Bezoeken_Student_Docent::all();
        return view('BpvDocentStudent.index', compact('studenten' , 'bpvdocenten', 'cohorts', 'bpvdocentstudent'));
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

        $bezoeken = new Bezoeken;
        $bezoeken->save();

        // Nadim 
        $laatstebezoekid   = Bezoeken::all()->sortByDesc('id')->take(1)->pluck('id')->toArray();
        $laatstebezoekidinsert = implode($laatstebezoekid);

        $BpvDocentStudent = new Bezoeken_Student_Docent;
        $BpvDocentStudent->bezoek_id         = $laatstebezoekidinsert;
        $BpvDocentStudent->student_id        = $request->student_id;
        $BpvDocentStudent->bpvdocent_id      = $request->bpvdocent_id;
        $BpvDocentStudent->cohort_id         = $request->cohort_id;
        $BpvDocentStudent->save();

        //Lars
        return redirect()->route('BpvDocentStudent.index')->with('message', 'BPV-Docent is succesvol gematched met een   student');
        
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
        $bezoekstudentdocentid = $id;
        $studentid = Bezoeken_Student_Docent::where('id', $id)->pluck('student_id');
        $studentenvoor = Student::where('id', $studentid)->pluck('naamstudent')->toArray();
        $studentnaam = implode($studentenvoor);

        $stuid = str_replace(array('[', ']'), '', htmlspecialchars(json_encode(
            $studentid), ENT_NOQUOTES));


        $bpvdocentstudent = Bezoeken_Student_Docent::find($id);
        $bpvdocenten = BPVDocent::all();
        $studenten = Student::orderByRaw("id = $stuid desc, id asc")->get();

        return view('BpvDocentStudent.edit', compact('bezoekstudentdocentid','bpvdocentstudent', 'studenten', 'bpvdocenten', 'studentnaam', 'studentid', 'stutest'));
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
        Bezoeken_Student_Docent::find($request->all());
        $bpvdocentstudent = Bezoeken_Student_Docent::find($id);
        $bpvdocentstudentUpdate = $request->all();
        $bpvdocentstudent->update($bpvdocentstudentUpdate);
        dd($bpvdocentstudentUpdate);
        return view('BpvDocentStudent.edit', compact('bpvdocentstudent','bpvdocentstudentUpdate'));
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
