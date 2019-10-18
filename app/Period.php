<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    //protected $tablePeriodos = "datatables_data";
    protected $fillable = [
        'nombre',
        'url_imagen',
        'tipo_periodo',
        'unidad',
        'estado',
    ];
}
