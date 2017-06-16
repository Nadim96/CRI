<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bezoeken extends Model
{
	
	protected $guarded = [];
	protected $table = 'bezoeken';	
    public function docent(){
    	return $this->belongsTo('App\User');
    }

     public function Bezoeken_Student_Docent()
    {
        return $this->hasMany('App\Bezoeken_Student_Docent');
    }
}
