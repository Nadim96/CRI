<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{

	protected $guarded = [];
    protected $table = 'cohort';

    public function Studie(){
      return $this->belongsToMany('App\Studie');
   }

 

   public function BezoekenStudentDocent(){
   	return $this->belongsToMany('App\Bezoeken_Student_Docent');
   }

}
