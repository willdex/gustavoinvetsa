<?php

namespace App;
    
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Peso extends Authenticatable 
                                    
{
    //use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table = 'peso';
    protected $fillable = [
        'id','peso_corporal','peso_bursa','peso_brazo','peso_timo','peso_higado','indice_bursal','indice_timico','indice_hepatico','bursometro','id_sistema','imei'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   // protected $dates = ['deleted_at'];
  
    
}
