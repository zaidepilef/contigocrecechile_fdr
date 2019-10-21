<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    protected $primarykey = "id";
    protected $fillable = [
        'nombre',
        'url_imagen',
        'tipo_periodo',
        'unidad',
        'estado',
    ];
}
