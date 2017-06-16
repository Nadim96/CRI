<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Excel;
use App\Input;
use DB;
use App\gebruikertest;

class MaatwebsiteDemoController extends Controller
{
	//12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
   public function importExport()
	{
		return view('import.importExport');
	}
	
	public function getExport(){
    	$customer=gebruikertest::all();
    	//Naam Excel bestand
    	Excel::create('Gebruikers', function($excel) use($customer){
    		$excel->sheet('Sheet 1',function($sheet) use ($customer){
    			$sheet->fromArray($customer);
    		});
    	//Export naar een xlsx bestand
    	})->export('xlsx');
    }

	public function importExcel(Request $request)
	{
		gebruikertest::truncate();
		//if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			

			if(!empty($data) && $data->count()){

				

				foreach ($data as $key => $value) {
					$insert[] = ['naam' => $value->naam, 'woonplaats' => $value->woonplaats];
				}
				
				//Als de gegevens zijn ingevuld ga dan weer terug naar de beheer pagina
				if(!empty($insert)){
					DB::table('gebruikertest')->insert($insert);
					return view('Beheer.index');
				}
			
		}
		
		return back();
	}}
	





