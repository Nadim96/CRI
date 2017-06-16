<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bezoeken_Student_Docent extends Model
{
    protected $table = 'bezoeken_student_docent';

    public function Bezoeken()
    {
        return $this->belongsToMany('App\Bezoeken');
    }
  
    public function Student(){
      return $this->belongsToMany('App\Student');
   }

   public function BPVDocent(){
      return $this->belongsToMany('App\BPVDocent');
   }

   public function Cohort(){
      return $this->belongsToMany('App\Cohort');
   }
}
