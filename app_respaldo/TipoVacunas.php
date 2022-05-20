<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVacunas extends Model
{
    protected $table = 'tipo_vacunas';

    protected $fillable  = [
     'nombre_vacuna',
     'estatus'
    ];
}
