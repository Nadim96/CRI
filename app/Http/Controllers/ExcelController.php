<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Customer;
use App\Student;
use App\BPVDocent;
use App\BPVBedrijf;
use App\Praktijkbegeleider;
use App\Bezoeken;
use App\Bezoekentest;
use App\Coach;
use App\Bezoeken_Student_Docent;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;


class ExcelController extends Controller
{
    //12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
    // Importeren - Irsjaad Ketwaru
    public function getImport(){
    	return view('excel.importCustomer');
    }

    public function getImportBPVDocent(){
        return view('excel.importBPVDocent');
    }
    

    // Importeren part 2 - Irsjaad Ketwaru
    public function postImport(){
        Bezoekentest::truncate();
        Excel::load(Input::file('customer'), function($reader){
            $reader->each(function($sheet){
                Bezoekentest::firstOrCreate($sheet->toArray());
            });
        });

        $fulltable = \App\Bezoekentest::all();
    }

    public function postImportBPVDocent(){
        BPVDocent::truncate();
        Excel::load(Input::file('BPV-Docent'), function($reader){
            $reader->each(function($sheet){
                BPVDocent::firstOrCreate($sheet->toArray());
            });
        });

        $fulltable = \App\BPVDocent::all();
    }

    // Exporteren van Studenten
    public function getExportStudent(){
        $student = Student::all();
        Excel::create('Studenten', function($excel) use($student){
            $excel->sheet('Sheet 1',function($sheet) use ($student){
                $sheet->fromArray($student);
            });
        })->export('xlsx');
    }

    //Exporteren BPV-Docenten
    public function getExportDocent(){
        $docent = BPVDocent::all();
        Excel::create('BPV-Docenten', function($excel) use($docent){
            $excel->sheet('Sheet 1',function($sheet) use ($docent){
                $sheet->fromArray($docent);
            });
        })->export('xlsx');
    }

    //Exporteren BPV-Bedrijven
    public function getExportBPVBedrijf(){
        $bpvbedrijven = BPVBedrijf::all();
        Excel::create('BPV-Bedrijven', function($excel) use($bpvbedrijven){
            $excel->sheet('Sheet 1',function($sheet) use ($bpvbedrijven){
                $sheet->fromArray($bpvbedrijven);
            });
        })->export('xlsx');
    }

    //Exporteren Praktijkbegeleider
    public function getExportPraktijkbegeleider(){
        $praktijkbegeleiders = Praktijkbegeleider::all();
        Excel::create('Praktijkbegeleiders', function($excel) use($praktijkbegeleiders){
            $excel->sheet('Sheet 1',function($sheet) use ($praktijkbegeleiders){
                $sheet->fromArray($praktijkbegeleiders);
            });
        })->export('xlsx');
    }

    //Exporteren Coaches
    public function getExportCoaches(){
        $coaches = Coach::all();
        Excel::create('Coaches', function($excel) use($coaches){
            $excel->sheet('Sheet 1',function($sheet) use ($coaches){
                $sheet->fromArray($coaches);
            });
        })->export('xlsx');
    }

    /*
    // Exporteren - Irsjaad Ketwaru
    public function getExportBezoek(){
        $bezoeken = Bezoeken::all();

        foreach ($bezoeken as $bezoek) {
            $findstudentid = Bezoeken_Student_Docent::Where('bezoek_id' , $bezoek->id)->pluck('student_id');
            foreach ($findstudentid as $stuid) {
                $studentnaam = Student::find($stuid);

            }
        }

        Excel::create('Bezoeken', function($excel) use($bezoeken){
            $excel->sheet('Sheet 1',function($sheet) use ($bezoeken){
                $sheet->fromArray($bezoeken);
            });
        })->export('xlsx');
    }*/
}



    

