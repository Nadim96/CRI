<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $fillable=[
    'title',
    'description'
  	];
  	public $timestamps=false;
}
