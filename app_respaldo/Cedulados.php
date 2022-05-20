<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cedulados extends Model
{
    protected $connection = 'sibo';

    protected $fillable  = [
        'lectura',
        'numcedula',
        'primernombre',
        'segundonombre',
        'primerapellido',
        'segundoapellido',
        'fechanac'
       ];
    
}
