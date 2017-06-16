<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachStudent extends Model
{
	protected $guarded = [];
    protected $table = 'coach_student';


    public function Student(){
      return $this->belongsToMany('App\Student');
   }

   public function Coach(){
      return $this->belongsToMany('App\Coach');
   }
    
    
}
