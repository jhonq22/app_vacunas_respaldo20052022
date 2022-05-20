<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuebloIndigenas extends Model
{
    protected $table = 'pueblos_indigenas';

    protected $fillable  = [
     'pueblo_indigena',
     'codigo_indigena'
    ];
}
