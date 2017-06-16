<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpleidingKlas extends Model
{
	protected $guarded = [];
    protected $table = 'opleiding_klas';


   public function Opleiding(){
      return $this->belongsToMany('App\Opleiding');
   }

   public function Klas(){
      return $this->belongsToMany('App\Klas');
   }
    
    
}