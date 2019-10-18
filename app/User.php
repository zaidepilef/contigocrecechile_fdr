<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    protected $table = 'users_ldap';

   
    protected $fillable = [
        'name', 'nombre','apellido','ldap','email', 'rol_id','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
