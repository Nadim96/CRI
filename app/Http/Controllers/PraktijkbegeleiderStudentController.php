<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Praktijkbegeleider;
use App\Student;
use App\PraktijkbegeleiderStudent;


class PraktijkbegeleiderStudentController extends Controller
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
        $praktijkbegeleiders            = Praktijkbegeleider::all();
        $studenten                      = Student::all();
        $praktijkbegeleiderstudent      = PraktijkbegeleiderStudent::all();


        return view('PraktijkbegeleiderStudent.index', compact('praktijkbegeleiders', 'studenten', 'praktijkbegeleiderstudent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

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

        $praktijkbegeleiderstudent = new PraktijkbegeleiderStudent;
        $praktijkbegeleiderstudent->praktijkbegeleider_id           = $request->praktijkbegeleider_id;
        $praktijkbegeleiderstudent->student_id                      = $request->student_id;
        $praktijkbegeleiderstudent->save();

        return redirect()->route('PraktijkbegeleiderStudent.index')->with('message', 'Praktijkbegeleider is succesvol gematched met een student');;
        
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
