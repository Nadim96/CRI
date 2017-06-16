<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PraktijkbegeleiderStudent extends Model
{

   protected $guarded = [];
   protected $table = 'praktijkbegeleider_student';


   public function Praktijkbegeleider(){
      return $this->belongsToMany('App\Praktijkbegeleider');
   }

   public function Student(){
      return $this->belongsToMany('App\Student');
   }
}
