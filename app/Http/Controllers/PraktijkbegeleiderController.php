<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Praktijkbegeleider;

class PraktijkbegeleiderController extends Controller
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
        $praktijkbegeleiders = Praktijkbegeleider::all();
        return view('Praktijkbegeleider.index' , compact('praktijkbegeleiders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Praktijkbegeleider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $praktijkbegeleiders = $request->all();
        Praktijkbegeleider::create($request->all());
        return redirect('Praktijkbegeleider')->with('message', 'Praktijkbegeleider is succesvol aangemaakt!');
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
        $praktijkbegeleiders = Praktijkbegeleider::find($id);
        return view('Praktijkbegeleider.edit', compact('praktijkbegeleiders'));
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
        Praktijkbegeleider::find($request->all());
        $praktijkbegeleiders = Praktijkbegeleider::find($id);
        $praktijkbegeleidersUpdate = $request->all();
        $praktijkbegeleiders->update($praktijkbegeleidersUpdate);
        return redirect('Praktijkbegeleider')->with('message', 'Praktijkbegeleiders is succesvol gewijzigd!');
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
