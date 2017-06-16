<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Praktijkbegeleider;
use App\Item;
use Excel;
use App\Input;
use DB;

class ImporteerPraktijkbegeleider extends Controller
{
	//12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
   public function importExport()
	{
		return view('ImportPraktijkbegeleider.importExport');
	}
	
	public function getExport(){
    	$praktijkbegeleider = Praktijkbegeleider::all();
    	//Naam Excel bestand
    	Excel::create('Praktijkbegeleider', function($excel) use($praktijkbegeleider){
    		$excel->sheet('Sheet 1',function($sheet) use ($praktijkbegeleider){
    			$sheet->fromArray($student);
    		});
    	//Export naar een xlsx bestand
    	})->export('xlsx');
    }

	public function importExcel(Request $request)
	{
		Praktijkbegeleider::truncate();
		//if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			

			if(!empty($data) && $data->count()){

				

				foreach ($data as $key => $value) {
					$insert[] = ['praktijkbegeleidernaam' => $value->praktijkbegeleidernaam, 'email' => $value->email, 'telefoonnummer' => $value->telefoonnummer, ];
				}
				
				//Als de gegevens zijn ingevuld ga dan weer terug naar de beheer pagina
				if(!empty($insert)){
					DB::table('praktijkbegeleider')->insert($insert);
					return view('Beheer.index');
				}
			
		}
		
		return back();
	}}
