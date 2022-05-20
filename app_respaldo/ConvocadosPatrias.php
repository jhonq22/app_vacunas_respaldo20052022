<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvocadosPatrias extends Model
{
    protected $table = 'convocados_patria';

    protected $fillable  = [
     'tipo_identificacion',
     'cedula',
     'nombres',
     'fecha_nacimiento',
     'edad',
     'telefono',
     'direccion',
     'estado_id',
     'centro_salud_id',
     'grupo_especial_id',
     'user_id',
     'estatu_convocado_id'
         
 ];
}
