<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BPVBedrijf;
use App\BPVDocent;
use App\Student;
use App\Opleiding;
use App\Coach;
use App\CoachStudent;
use App\Studie;

class GebruikersInformatieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
    
    public function index()
    {

       	$student = Student::all();
        $bpvdocent = BPVDocent::all();
        $bpvbedrijf = BPVBedrijf::all();
        $opleiding = Opleiding::all();
        $coach = CoachStudent::all();
        $studie = Studie::all();
        return view('GebruikersInformatie.index', compact('student', 'bpvdocent', 'bpvbedrijf', 'opleiding','coach', 'studie'));

    }

    public function store(Request $request)
    {
    	if ($request->input('student')) {
    		$student = Student::all();
            $coach = CoachStudent::all();
            $doc = BPVDocent::all();
    	}
    	if ($request->input('docent')) {
    		$bpvdocent = BPVDocent::all();
    	}
    	if ($request->input('bpvbedrijf')) {
    		$bpvbedrijf = BPVBedrijf::all();
    	}

        $opleiding = Opleiding::all();
    	return view('GebruikersInformatie.index', compact('student', 'bpvdocent', 'bpvbedrijf', 'opleiding'));
    }

     public function show($id)
    {   
        $coachstudentid = $id;
        $studentid = CoachStudent::where('id', $id)->pluck('student_id');
        $studentenvoor = Student::where('id', $studentid)->pluck('naamstudent')->toArray();
        $studentnaam = implode($studentenvoor);

        $stuid = str_replace(array('[', ']'), '', htmlspecialchars(json_encode(
            $studentid), ENT_NOQUOTES));


        $CoachStudent = CoachStudent::find($id);
        $Coach = Coach::all();
        $studenten = Student::orderByRaw("id = $stuid desc, id asc")->get();

        return view('GebruikersInformatie.index', compact('coachstudentid' ,'studentid', 'studentenvoor' , 'studentnaam' , 'stuid'  , 'CoachStudent', 'Coach' , 'studenten' ));
    }

}
