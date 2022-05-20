<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacunasRecibidas extends Model
{
    protected $table = 'vacunas_recibidas';

    protected $fillable  = [
     'tipo_vacuna_id',
     'numero_lote',
     'fecha_vencimiento',
     'componentes',
     'user_id',
     'cantidad',
     'estado_id',
     'municipio_id',
     'centro_salud_id',
     'grupo_especial_id'
    

   
   ];
}
