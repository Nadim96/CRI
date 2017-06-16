<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

	protected $guarded = [];
   protected $table = 'student';



   public function BpvBedrijf(){
   	return $this->belongsTo('App\BPVBedrijf');
   }

   public function BpvDocent(){
   	return $this->belongsTo('App\BPVDocent');
   }

   public function Opleidingen(){
   	return $this->belongsTo('App\Opleiding');
   }

   public function Studie(){
      return $this->belongsToMany('App\Studie');
   }

   public function CoachStudent(){
      return $this->belongsToMany('App\CoachStudent');
   }
   
   public function Bezoeken_Student_Docent(){
      return $this->belongsToMany('App\Bezoeken_Student_Docent');
    }
    
     
}
