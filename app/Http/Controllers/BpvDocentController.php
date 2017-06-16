<?php

namespace App\Http\Controllers;

use App\BPVDocent;
use Illuminate\Http\Request;
use App\Http\Requests\BpvDocentRequest;  
use App\Http\Controllers\Controller;
use DB;
use Session;

class BpvDocentController extends Controller
{
    //12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }

    public function index()
    {
        $fulltable = BPVDocent::all();
        
        return view('BpvDocent.index', compact('fulltable'));
    }

    public function search(Request $request)
    {
        if ($request->ajax())
        {
            $output="";
            //$sex="";
            $customers=DB::table('bpvdocent')->where('naam','LIKE','%'.$request->search. '%')
                                             /*->orWhere('bpvdocentcode','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek1','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek2','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek3','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek4','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek5','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek6','LIKE','%'.$request->search. '%')
                                             ->orWhere('bezoek7','LIKE','%'.$request->search. '%')*/
                                             //->take(10)
                                             ->get();
            if ($customers)//
            {
            foreach($customers as $customer) {

                $output.='<tr>'.
                '<td>'.$customer->naam.'</td>'.
                /*'<td>'.$customer->bpvdocentcode.'</td>'.
                '<td>'.$customer->bezoek1.'</td>'.
                '<td>'.$customer->bezoek2.'</td>'.
                '<td>'.$customer->bezoek3.'</td>'.
                '<td>'.$customer->bezoek4.'</td>'.
                '<td>'.$customer->bezoek5.'</td>'.
                '<td>'.$customer->bezoek6.'</td>'.
                '<td>'.$customer->bezoek7.'</td>'.*/
                '</tr>';
            }
                return Response($output);  
            }
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new reso urce.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BpvDocent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bpv_docenten = $request->all();
        BpvDocent::create($request->all());
        //11-05-2017 Lars: Als de gegevens succesvol zijn opgeslagen dan komt er een melding en de gebruiker wordt terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('BPV-Docent')->with('message', 'BPV-Docent is succesvol aangemaakt!');
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
        $bpv_docenten = BpvDocent::find($id);
        return view('BpvDocent.edit', compact('bpv_docenten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BpvDocentRequest $request, $id)
    {
        BpvDocent::find($request->all());
        $bpv_docenten = BpvDocent::find($id);
        $bpvDocentUpdate = $request->all();
        $bpv_docenten->update($bpvDocentUpdate);
        return redirect('BPV-Docent')->with('message', 'BPV-Docent is succesvol gewijzigd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bpv_docenten = BpvDocent::find($id);
        //11-05-2017 Lars: BPV-Bedrijf wordt gverwijderd door middel van zijn id
        $bpv_docenten->delete();
        //11-05-2017 Lars: Na het succesvol verwijderen word je terug gestuurd naar de BPV-Bedrijf pagina
        return redirect('BPV-Docent')->with('message', 'BPV-Docent is succesvol verwijderd!');;
    }
}
