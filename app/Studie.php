<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studie extends Model
{
    protected $guarded = [];
    protected $table = 'studie';

    public function Cohort(){
      return $this->belongsToMany('App\Cohort');
   }

    public function Student(){
    	return $this->belongsToMany('App\Student');
    }

    public function Opleiding()
    {
        return $this->hasMany('App\Opleiding');
    }

	 public function Klas()
    {
        return $this->hasMany('App\Klas');
    }   
}
