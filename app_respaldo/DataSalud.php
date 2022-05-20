<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSalud extends Model
{
    protected $table = 'personal_salud';

    protected $fillable  = [
     'cedula',
     'nombres',
     'apellidos',
     'estado'
    ];
}
}
