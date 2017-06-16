<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Item;
use Excel;
use App\Input;
use DB;
class ImporteerStudenten extends Controller
{
	//12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
   public function importExport()
	{
		return view('ImportStudent.importExport');
	}
	
	public function getExport(){
    	$student = Student::all();
    	//Naam Excel bestand
    	Excel::create('Coaches', function($excel) use($student){
    		$excel->sheet('Sheet 1',function($sheet) use ($student){
    			$sheet->fromArray($student);
    		});
    	//Export naar een xlsx bestand
    	})->export('xlsx');
    }

	public function importExcel(Request $request)
	{
		Student::truncate();
		//if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			

			if(!empty($data) && $data->count()){

				

				foreach ($data as $key => $value) {
					$insert[] = ['naamstudent' => $value->naamstudent, 'woonplaats' => $value->woonplaats];
				}
				
				//Als de gegevens zijn ingevuld ga dan weer terug naar de beheer pagina
				if(!empty($insert)){
					DB::table('student')->insert($insert);
					return view('Beheer.index');
				}
			
		}
		
		return back();
	}}
