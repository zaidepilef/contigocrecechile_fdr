<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User_app extends Model
{
    //
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'tipo_user',
        'region',
        'api_token',
    ];
}
