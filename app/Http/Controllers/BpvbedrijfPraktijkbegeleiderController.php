<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Praktijkbegeleider;
use App\BpvbedrijfPraktijkbegeleider;
use App\BPVBedrijf;
use App\Cohort;

class BpvbedrijfPraktijkbegeleiderController extends Controller
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

        $bpvbedrijven                   = BPVBedrijf::all();
        $praktijkbegeleiders            = Praktijkbegeleider::all();
        $bpvbedrijfpraktijkbegeleider   = BpvbedrijfPraktijkbegeleider::all();
        return view('BpvBedrijfPraktijkbegeleider.index', compact('bpvbedrijven' , 'praktijkbegeleiders', 'bpvbedrijfpraktijkbegeleider'));
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

        $BpvDocentStudent = new BpvbedrijfPraktijkbegeleider;
        $BpvDocentStudent->bpvbedrijf_id           = $request->bpvbedrijf_id;
        $BpvDocentStudent->praktijkbegeleider_id        = $request->praktijkbegeleider_id;
        $BpvDocentStudent->save();

        return redirect()->route('BpvBedrijfPraktijkbegeleider.index')->with('message', 'BPV-Bedrijf is succesvol gematched met een   praktijkbegeleider');;
        
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
