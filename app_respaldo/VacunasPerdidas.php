<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacunasPerdidas extends Model
{
    protected $table = 'vacunas_perdidas';

    protected $fillable  = [
     'tipo_vacuna_id',
     'numero_lote',
     'fecha_vencimiento',
     'numero_dosis_perdidas',
     'user_id',
     'causa_perdida'
   
   ];
}
