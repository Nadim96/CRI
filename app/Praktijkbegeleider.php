<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praktijkbegeleider extends Model
{
    protected $guarded = [];
    protected $table = 'praktijkbegeleider';


    public function BpvbedrijfPraktijkbegeleider(){
      return $this->belongsToMany('App\BpvbedrijfPraktijkbegeleider');
   }
}
