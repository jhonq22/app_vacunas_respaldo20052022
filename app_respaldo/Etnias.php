<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etnias extends Model
{
    protected $table = 'etnias';

    protected $fillable  = [
     'etnia',
     'codigo_etnia'
    ];
   
}
