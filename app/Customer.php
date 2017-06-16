<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'bezoekentest';
    protected $fillable=[
    	'studentcode',
    	'bpvdocentcode',
    	'bezoek1',
    	'bezoek2',
    	'bezoek3',
    	'bezoek4',
    	'bezoek5',
    	'bezoek6',
    	'bezoek7',

    	//'first_name',
    	//'last_name',
    	//'email',
    ];
    public $timestamps=false;
}
// in model