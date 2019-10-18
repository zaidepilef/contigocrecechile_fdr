<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    
    protected $table = 'modules_system';

   
    protected $fillable = [
        'module_name', 'module_description'
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
        'created_at' => 'datetime',
    ];
}
