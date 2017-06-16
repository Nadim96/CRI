<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BpvdocentStudent extends Model
{
	protected $guarded = [];
    protected $table = 'bpvdocent_student';


   public function Student(){
      return $this->belongsToMany('App\Student');
   }

   public function BPVDocent(){
      return $this->belongsToMany('App\BPVDocent');
   }

   public function Cohort(){
      return $this->belongsToMany('App\Cohort');
   }
    
    
}