<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bezoeken;
use App\bpvdocent;
use Input;
use DB;

class BezoekenController extends Controller
{
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
        $opleidingen = \App\Opleiding::all();
        $bezoeken = \App\Bezoeken::all();

        return view('bezoeken.index', compact('opleidingen', 'bezoeken'));
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

        //haalt klassen op aan de hand van de gekozen opleiding
        if ($request->input('opleiding')) {

            //klassen ophalen aan de hand van een opleidingskeuze
            $opleidingkeuze = implode($request->input('opleiding'));
            $klasidfromopleiding = \App\Opleiding::find($opleidingkeuze)->Studie->pluck('klas_id')->toArray();
            $klassen = \App\Klas::find($klasidfromopleiding);

            //standaard
            $opleidingen = \App\Opleiding::all();

            return view('bezoeken.index', compact('klassen', 'opleidingen', 'opleidingkeuze'));
        }


         //bezoeken ophalen aan de hand van een klaskeuze
        if ($request->input('klas')) {

            //bezoeken ophalen aan de hand van klaskeuze
            $klaskeuze = implode($request->input('klas'));
            $studentcode = \App\Klas::find($klaskeuze)->Studie->pluck('student_id');
           

            //opleiding aan de hand van klaskeuze
            $opleidingidfromklas = \App\Klas::find($klaskeuze)->Studie->pluck('opleiding_id')->take(1)->toArray();
            $opleidingkeuze = implode($opleidingidfromklas);

            //klas aan de hand van opleiding
            $klasidfromopleiding = \App\Opleiding::find($opleidingkeuze)->Studie->pluck('klas_id')->toArray();
            $klassen = \App\Klas::find($klasidfromopleiding);

            //standaard
            $opleidingen = \App\Opleiding::all();

            return view('bezoeken.index', compact('studentcode', 'opleidingen', 'klassen', 'opleidingkeuze', 'klaskeuze'));


        }

/*
         if($request->input('opleiding')){
            $opleidingkeuze = implode($request->input('opleiding'));
            $opleidingen = \App\Opleiding::all();
            $klassen = \App\Opleiding::find($opleidingkeuze)->Klas;

            
            return view('bezoeken.index', compact('opleidingen','student','bezoeken','studentcode','test','klassen', 'opleidingkeuze'));
         }



         if ($request->input('id')) {
             $klasid = implode($request->input('id'));
             $studentcode = \App\Student::where('klas', '=', '{{$klasid}}')->get();
             $opleidingid = \App\Klas::find($klasid)->Opleiding->toArray();
             unset($opleidingid['opleidingnaam']);
             $opl = implode($opleidingid);
             dd($opl);
             $klassen = \App\Klas::where('opleiding_id', '=', '{{$opl}}')->get();
             dd($klassen);
             $opleidingen = \App\Opleiding::all();
             $bezoeken = \App\Bezoeken::all();

             return view('bezoeken.index', compact('opleidingen','student','bezoeken','studentcode','test', 'klasid'))->with('klassen', $klassen);
        }else{
            $opleidingen = \App\Opleiding::all();
            $bezoeken = \App\Bezoeken::all();
            return view('bezoeken.index', compact('opleidingen', 'bezoeken'));
        }


*/
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
