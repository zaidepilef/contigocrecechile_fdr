<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesModulos extends Model
{
    
    protected $table = 'roles_modules';

   
    protected $fillable = [
        'rol_id', 'module_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];
}
