<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BPVDocent extends Authenticatable
{
	protected $guarded = [];
    protected $table = 'bpvdocent';

    public function students(){
    	return $this->hasMany('App\Student');
    }

    public function Bezoeken_Student_Docent(){
    	return $this->belongsToMany('App\Bezoeken_Student_Docent');
    }
}

