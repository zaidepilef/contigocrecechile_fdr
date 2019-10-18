<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    //
    protected $fillable = [
        'inicio',
        'fin',
        'id_periodo',
        'id_subperiodo',
    ];
}
