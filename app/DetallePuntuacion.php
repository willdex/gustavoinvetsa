<?php

namespace App;
    
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class DetallePuntuacion extends Authenticatable 
                                    
{
    //use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table = 'detalle_puntuacion';
    protected $fillable = [
        'id','nombre','estado','id_puntuacion','id_sistema','imei'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];
  
    
}
