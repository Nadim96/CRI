<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gebruikertest extends Model
{
    protected $table='gebruikertest';
    protected $guarded = [];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
