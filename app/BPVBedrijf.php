<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BpvBedrijf extends Model
{
	protected $guarded = [];
    protected $table = 'bpvbedrijf';


    public function students(){
    	return $this->hasMany('App\Student');
    }

    public function BpvbedrijfPraktijkbegeleider(){
    	return $this->hasMany('App\BpvbedrijfPraktijkbegeleider');
    }
}
