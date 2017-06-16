<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BpvbedrijfPraktijkbegeleider extends Model
{
	protected $guarded = [];
    protected $table = 'bpvbedrijf_praktijkbegeleider';


    public function Praktijkbegeleider(){
      return $this->belongsToMany('App\Praktijkbegeleider');
   }

   public function BPVBedrijven(){
      return $this->belongsToMany('App\BPVBedrijf');
   }
    
    
}
