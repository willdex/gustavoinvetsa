<?php

namespace App;
    
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Sistema_Integral extends Authenticatable 
                                    
{
    //use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table = 'sistema_integral';
    protected $fillable = [
        'codigo','revision','edad','sexo','observaciones','fecha','nro_pollos','imagen1','imagen2','imagen3','imagen4','imagen5','imagen6','imagen7','imagen8','imagen9','imagen10','id_galpon','id_granja','id_empresa','id_sqlite','imei','firma_invetsa','firma_empresa','id_tecnico','imagen_jefe','referencia','comentarios'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   // protected $dates = ['deleted_at'];
  
    
}
