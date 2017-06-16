<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klas extends Model
{
	protected $guarded = [];
    protected $table = 'klas';



    public function OpleidingKlas(){
      return $this->belongsToMany('App\OpleidingKlas');
   	}

   public function Opleiding(){
      return $this->belongsTo('App\Opleiding');
   }

    public function Studie()
    {
        return $this->hasMany('App\Studie');
    }
    
    
}

