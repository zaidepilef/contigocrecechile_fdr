<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    //
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'fecha_concepcion',
        'sexo',
        'estado',
    ];
}
