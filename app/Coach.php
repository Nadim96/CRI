<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
	protected $guarded = [];
    protected $table = 'coach';
    
    public function CoachStudent(){
      return $this->belongsToMany('App\CoachStudent');
   }
    
}
