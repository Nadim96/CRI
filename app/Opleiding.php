<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opleiding extends Model
{

	protected $guarded = [];

	protected $table = 'opleiding';

    public function Student(){
   	return $this->hasMany('App\Student');
   	
   }


   public function Klas(){
      return $this->hasMany('App\Klas');
   }

   public function OpleidingKlas(){
      return $this->belongsToMany('App\OpleidingKlas');
   }

   public function Studie()
    {
        return $this->hasMany('App\Studie');
    }
    
    
}

