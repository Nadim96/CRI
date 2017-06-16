<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
		// categories table (database)

	protected $guarded = [];

    protected $table = 'categories';

    public function posts(){
    	return $this->hasMany('App\Posts');
    }
}
