<?php

namespace App;
    
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Puntuacion extends Authenticatable 
                                    
{
    //use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table = 'puntuacion';
    protected $fillable = [
        'id','nombre','id_sistema','imei'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];
  
    
}
