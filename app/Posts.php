<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

	//Lars : dit zorgt ervoor dat de json data niet op de site word getoond
	protected $hidden = ['id' , 'title' , 'body' , 'created_at' , 'updated_at' , 'category_id'];


    public function post(){
    	return $this->belongsTo('App\Category');
    }
}
