<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
    protected $table = 'parroquias';

    protected $fillable  = [
     'id_pais',
     'id_estado',
     'id_municipio',
     'nb_parroquia'
        
   ];
}
