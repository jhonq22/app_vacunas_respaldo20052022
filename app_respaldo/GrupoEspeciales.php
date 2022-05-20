<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoEspeciales extends Model
{
    protected $table = 'grupo_especiales';

    protected $fillable  = [
     'grupo_especial',
     'codigo_grupo_especial'
    ];
}


