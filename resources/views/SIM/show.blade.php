@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.cargando')
@include('alerts.success')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <H4 style="color:red"><b>ACTUALIZAR SISTEMA INTEGRAL DE MONITOREO</b></H4>    
    @include('alerts.request')    

  {!!Form::model($sistema_integral,['route'=>['GuardarSIM.update',$sistema_integral->id],'method'=>'PUT','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;','enctype'=>'multipart/form-data','onsubmit'=>'javascript: return Validar_SIM_Guardar()'])!!}

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="form-group" id="div_empresa">
            {!!Form::label('empresa','Empresa:')!!}
            {!!Form::select('empresa',$empresa,$sistema_integral->id_empresa,['id'=>'empresa','class'=>'form-control selectpicker','placeholder'=>'Seleccione Una Empresa','data-live-search'=>'true','disabled'])!!}
        </div>    
        <div class="form-group" id="div_granja">
            {!!Form::label('granja','Granja:')!!}
            {!!Form::select('granja',$granja,$sistema_integral->id_granja,['id'=>'granja','class'=>'form-control','placeholder'=>'Seleccione Una Granja','disabled'])!!}            
        </div>                        
    </div>

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">                      
        <div class="form-group" id="div_zona">
            {!!Form::label('zona','Zona:')!!}
            {!!Form::text('zona',$datos[0]->zona,['class'=>'form-control','placeholder'=>'Zona','readonly'])!!}
        </div>  
        <div class="form-group" id="div_galpon">
            {!!Form::label('galpon','Galpon:')!!}
            {!!Form::select('galpon',$galpon,$sistema_integral->id_galpon,['id'=>'galpon','class'=>'form-control','placeholder'=>'Seleccione Un Galpon','disabled'])!!}              
        </div>          
    </div>

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <div class="form-group" id="div_edad">
            {!!Form::label('edad','Edad:')!!}
            {!!Form::text('edad',$sistema_integral->edad,['class'=>'form-control','style'=>'text-align:center;font-size:13pt','onkeypress'=>'return bloqueo_de_punto(event)','maxlength'=>'2','onclick'=>'return limpia(this)', 'onBlur'=>'return verificar(this)','readonly'])!!}
            <?php // {!!Form::select('edad',array('14'=>'14','21'=>'21','25'=>'25','28'=>'28','35'=>'35','42'=>'42'),null,['id'=>'edad','class'=>'form-control','placeholder'=>'Seleccione Una Edad','disabled'])!!} ?>
        </div>    
        <div class="form-group" id="div_sexo">
            {!!Form::label('sexo','Sexo:')!!}
            {!!Form::select('sexo',array('F'=>'Hembra','M'=>'Macho','0'=>'Mixto'),null,['id'=>'sexo','class'=>'form-control','placeholder'=>'Seleccione Un Sexo','disabled'])!!}
        </div>            
    </div>

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">  
        <div class="form-group" id="div_nro_pollos">
            {!!Form::label('nro_pollos','Nro de Pollos:')!!}
            {!!Form::number('nro_pollos',null,['class'=>'form-control','style'=>'font-size:13pt','placeholder'=>'Nro de Pollos','onkeypress'=>'return bloqueo_de_punto(event)','disabled'])!!}
        </div>  

        <div class="form-group" id="div_fecha">
            {!!Form::label('fecha','Fecha:')!!}
              <div class='input-group date' id='datetimepicker10'>
                <input type='text' class="form-control" id="fecha" name="fecha" value="{{$sistema_integral->fecha}}" style="font-size:15px;text-align:left" disabled/>
                <span class="input-group-addon ">
                   <span class="fa fa-calendar" aria-hidden="true"></span> 
                </span>
              </div>
        </div>          
    </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <div class="form-group"> {!!Form::label('codigo','Codigo:')!!} <font size="4"><b>R.50</b></font> </div>   
        <div class="form-group"> {!!Form::label('revision','Revisión:')!!} <font size="4"><b>00</b></font> </div>           
    </div>
  </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
      <div class="table-responsive">    
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #00993b; color: white">
        <th><center>Peso Corporal</center></th> 
        <th><center>Peso de Bursa (g)</center></th> 
        <th><center>Peso de Bazo (g)</center></th> 
        <th><center>Peso de Timo (g)</center></th> 
        <th><center>Peso de Higado (g)</center></th> 
        <th><center>Indice Bursal</center></th> 
        <th><center>Indice Timico</center></th> 
        <th><center>Indice Hepatico</center></th> 
        <th><center>Bursometro</center></th> 
        </thead>
        <tbody>
          <tr align="center">
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_1" onkeypress="return numerosmasdecimal(event)" value="{{$peso[0]->peso_corporal}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_1" onkeypress="return numerosmasdecimal(event)" value="{{$peso[0]->peso_bursa}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_1" onkeypress="return numerosmasdecimal(event)" value="{{$peso[0]->peso_brazo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_1" onkeypress="return numerosmasdecimal(event)" value="{{$peso[0]->peso_timo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_1" onkeypress="return numerosmasdecimal(event)" value="{{$peso[0]->peso_higado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_1" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[0]->indice_bursal}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_1" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[0]->indice_timico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_1" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[0]->indice_hepatico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_1" onkeypress="return numerosmasdecimal(event)" value="{{$peso[0]->bursometro}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>                      
          </tr>
          <tr align="center">
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_2" onkeypress="return numerosmasdecimal(event)" value="{{$peso[1]->peso_corporal}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_2" onkeypress="return numerosmasdecimal(event)" value="{{$peso[1]->peso_bursa}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_2" onkeypress="return numerosmasdecimal(event)" value="{{$peso[1]->peso_brazo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_2" onkeypress="return numerosmasdecimal(event)" value="{{$peso[1]->peso_timo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_2" onkeypress="return numerosmasdecimal(event)" value="{{$peso[1]->peso_higado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_2" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[1]->indice_bursal}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_2" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[1]->indice_timico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_2" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[1]->indice_hepatico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_2" onkeypress="return numerosmasdecimal(event)" value="{{$peso[1]->bursometro}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>            
          </tr>
          <tr align="center">
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_3" onkeypress="return numerosmasdecimal(event)" value="{{$peso[2]->peso_corporal}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_3" onkeypress="return numerosmasdecimal(event)" value="{{$peso[2]->peso_bursa}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_3" onkeypress="return numerosmasdecimal(event)" value="{{$peso[2]->peso_brazo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_3" onkeypress="return numerosmasdecimal(event)" value="{{$peso[2]->peso_timo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_3" onkeypress="return numerosmasdecimal(event)" value="{{$peso[2]->peso_higado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_3" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[2]->indice_bursal}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_3" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[2]->indice_timico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_3" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[2]->indice_hepatico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_3" onkeypress="return numerosmasdecimal(event)" value="{{$peso[2]->bursometro}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>            
          </tr>  
          <tr align="center">
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_4" onkeypress="return numerosmasdecimal(event)" value="{{$peso[3]->peso_corporal}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_4" onkeypress="return numerosmasdecimal(event)" value="{{$peso[3]->peso_bursa}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_4" onkeypress="return numerosmasdecimal(event)" value="{{$peso[3]->peso_brazo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_4" onkeypress="return numerosmasdecimal(event)" value="{{$peso[3]->peso_timo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_4" onkeypress="return numerosmasdecimal(event)" value="{{$peso[3]->peso_higado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_4" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[3]->indice_bursal}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_4" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[3]->indice_timico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_4" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[3]->indice_hepatico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_4" onkeypress="return numerosmasdecimal(event)" value="{{$peso[3]->bursometro}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>            
          </tr>  
          <tr align="center">
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_5" onkeypress="return numerosmasdecimal(event)" value="{{$peso[4]->peso_corporal}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_5" onkeypress="return numerosmasdecimal(event)" value="{{$peso[4]->peso_bursa}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_5" onkeypress="return numerosmasdecimal(event)" value="{{$peso[4]->peso_brazo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_5" onkeypress="return numerosmasdecimal(event)" value="{{$peso[4]->peso_timo}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_5" onkeypress="return numerosmasdecimal(event)" value="{{$peso[4]->peso_higado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_5" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[4]->indice_bursal}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_5" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[4]->indice_timico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_5" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[4]->indice_hepatico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_5" onkeypress="return numerosmasdecimal(event)" value="{{$peso[4]->bursometro}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled></td>            
          </tr>  
          <tr align="center" style="background: #00993b">
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->peso_corporal}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->peso_bursa}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->peso_brazo}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->peso_timo}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_6" onkeypress="return numerosmasdecimal(event)"  readonly value="{{$peso[5]->peso_higado}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->indice_bursal}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->indice_timico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->indice_hepatico}}"></td>
            <td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_6" onkeypress="return numerosmasdecimal(event)" readonly value="{{$peso[5]->bursometro}}"></td>             
          </tr>                                                 
        </tbody>
      </table>          
      </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>1.-Pico(aftas)</b></h5> <input type="hidden" name="titulo_1" value="{{$puntuacion[0]->nombre_puntuacion}}"> <input type="hidden" name="cont_1" value="4"></td> </tr>
          </thead>
          <tbody>

            <tr> <td>Comisura:<input type="hidden" name="nombre_1" value="{{$puntuacion[0]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_1" class="form-control" value="{{$puntuacion[0]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Paladar Duro:<input type="hidden" name="nombre_2" value="{{$puntuacion[1]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_2" class="form-control" value="{{$puntuacion[1]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Paladar Blando:<input type="hidden" name="nombre_3" value="{{$puntuacion[2]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_3" class="form-control" value="{{$puntuacion[2]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Necrosis de la punta de la lengua:<input type="hidden" name="nombre_4" value="{{$puntuacion[3]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_4" class="form-control" value="{{$puntuacion[3]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>        
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">                      
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>2.-Petequias</b></h5> <input type="hidden" name="titulo_2" value="{{$puntuacion[4]->nombre_puntuacion}}"> <input type="hidden" name="cont_2" value="3"> </td> </tr>
          </thead>
          <tbody>
            <tr> <td>Pechuga:<input type="hidden" name="nombre_5" value="{{$puntuacion[4]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_5" class="form-control" value="{{$puntuacion[4]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Pierna:<input type="hidden" name="nombre_6" value="{{$puntuacion[5]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_6" class="form-control" value="{{$puntuacion[5]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Esternón:<input type="hidden" name="nombre_7" value="{{$puntuacion[6]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_7" class="form-control" value="{{$puntuacion[6]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>          
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>3.- Tarsos</b></h5> <input type="hidden" name="titulo_3" value="{{$puntuacion[7]->nombre_puntuacion}}"> <input type="hidden" name="cont_3" value="3"> </td> </tr>
          </thead>
          <tbody>
            <tr> <td>Frágil:<input type="hidden" name="nombre_8" value="{{$puntuacion[7]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_8" class="form-control" value="{{$puntuacion[7]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Flexible:<input type="hidden" name="nombre_9" value="{{$puntuacion[8]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_9" class="form-control" value="{{$puntuacion[8]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Duro:<input type="hidden" name="nombre_10" value="{{$puntuacion[9]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_10" class="form-control" value="{{$puntuacion[9]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>          
    </div>
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>4. Relación Morfométrica Bursa / Bazo:</b></h5> <input type="hidden" name="titulo_4" value="{{$puntuacion[10]->nombre_puntuacion}}"> <input type="hidden" name="cont_4" value="3"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>A favor de la Bursa:<input type="hidden" name="nombre_11" value="{{$puntuacion[10]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_11" class="form-control" value="{{$puntuacion[10]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>A favor del Bazo:<input type="hidden" name="nombre_12" value="{{$puntuacion[11]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_12" class="form-control" value="{{$puntuacion[11]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Relación 1 / 1:<input type="hidden" name="nombre_13" value="{{$puntuacion[12]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_13" class="form-control" value="{{$puntuacion[12]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>        
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">                      
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>5. Apariencia de los pliegues internos de la bursa:</b></h5> <input type="hidden" name="titulo_5" value="{{$puntuacion[13]->nombre_puntuacion}}"> <input type="hidden" name="cont_5" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_14" value="{{$puntuacion[13]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_14" class="form-control" value="{{$puntuacion[13]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Anormal:<input type="hidden" name="nombre_15" value="{{$puntuacion[14]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_15" class="form-control" value="{{$puntuacion[14]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>          
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>6. Tamaño y apariencia del Timo:</b></h5> <input type="hidden" name="titulo_6" value="{{$puntuacion[15]->nombre_puntuacion}}"> <input type="hidden" name="cont_6" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_16" value="{{$puntuacion[15]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_16" class="form-control" value="{{$puntuacion[15]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Anormal:<input type="hidden" name="nombre_17" value="{{$puntuacion[16]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_17" class="form-control" value="{{$puntuacion[16]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>          
    </div>
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>7. Sacos aéreos:</b></h5> <input type="hidden" name="titulo_7" value="{{$puntuacion[17]->nombre_puntuacion}}"> <input type="hidden" name="cont_7" value="3"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normales:<input type="hidden" name="nombre_18" value="{{$puntuacion[17]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_18" class="form-control" value="{{$puntuacion[17]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Aerosaculitis Abdominal:<input type="hidden" name="nombre_19" value="{{$puntuacion[18]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_19" class="form-control" value="{{$puntuacion[18]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Aerosaculitis Torácica:<input type="hidden" name="nombre_20" value="{{$puntuacion[19]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_20" class="form-control" value="{{$puntuacion[19]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>        
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">                      
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>8. Tráquea:</b></h5> <input type="hidden" name="titulo_8" value="{{$puntuacion[20]->nombre_puntuacion}}"> <input type="hidden" name="cont_8" value="4"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_21" value="{{$puntuacion[20]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_21" class="form-control" value="{{$puntuacion[20]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Congestionada:<input type="hidden" name="nombre_22" value="{{$puntuacion[21]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_22" class="form-control" value="{{$puntuacion[21]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Hemorrágica:<input type="hidden" name="nombre_23" value="{{$puntuacion[22]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_23" class="form-control" value="{{$puntuacion[22]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Con mucosidad:<input type="hidden" name="nombre_24" value="{{$puntuacion[23]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_24" class="form-control" value="{{$puntuacion[23]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                        
          </tbody>
        </table>          
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>9. Cornetes Nasales:</b></h5> <input type="hidden" name="titulo_9" value="{{$puntuacion[24]->nombre_puntuacion}}"> <input type="hidden" name="cont_9" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_25" value="{{$puntuacion[24]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_25" class="form-control" value="{{$puntuacion[24]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Congestionado:<input type="hidden" name="nombre_26" value="{{$puntuacion[25]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_26" class="form-control" value="{{$puntuacion[25]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>          
    </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>10. Hígados:</b></h5> <input type="hidden" name="titulo_10" value="{{$puntuacion[26]->nombre_puntuacion}}"> <input type="hidden" name="cont_10" value="5"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_27" value="{{$puntuacion[26]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_27" class="form-control" value="{{$puntuacion[26]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Inflamado:<input type="hidden" name="nombre_28" value="{{$puntuacion[27]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_28" class="form-control" value="{{$puntuacion[27]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Pálido y friable:<input type="hidden" name="nombre_29" value="{{$puntuacion[28]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_29" class="form-control" value="{{$puntuacion[28]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Moteado:<input type="hidden" name="nombre_30" value="{{$puntuacion[29]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_30" class="form-control" value="{{$puntuacion[29]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Punto de exudado:<input type="hidden" name="nombre_31" value="{{$puntuacion[30]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_31" class="form-control" value="{{$puntuacion[30]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>        
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">                      
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>11.Vesicula Biliar:</b></h5> <input type="hidden" name="titulo_11" value="{{$puntuacion[31]->nombre_puntuacion}}"> <input type="hidden" name="cont_11" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Llena:<input type="hidden" name="nombre_32" value="{{$puntuacion[31]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_32" class="form-control" value="{{$puntuacion[31]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Vacía:<input type="hidden" name="nombre_33" value="{{$puntuacion[32]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_33" class="form-control" value="{{$puntuacion[32]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                    
          </tbody>
        </table>          
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>12. Proventrículo:</b></h5> <input type="hidden" name="titulo_12" value="{{$puntuacion[33]->nombre_puntuacion}}"> <input type="hidden" name="cont_12" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_34" value="{{$puntuacion[33]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_34" class="form-control" value="{{$puntuacion[33]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Proventriculitis:<input type="hidden" name="nombre_35" value="{{$puntuacion[34]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_35" class="form-control" value="{{$puntuacion[34]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>          
    </div>
    </div>




    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>13. Ulceración de Mollejas:</b></h5> <input type="hidden" name="titulo_13" value="{{$puntuacion[35]->nombre_puntuacion}}"> <input type="hidden" name="cont_13" value="4"></td> </tr>
            <tr align="center"> <td><h6><b>Grado:</b></h5></td> <td><h6><b>Cantidad:</b></h5></td></tr>   
          </thead>
          <tbody>
            <tr> <td>0:<input type="hidden" name="nombre_36" value="{{$puntuacion[35]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_36" class="form-control" value="{{$puntuacion[35]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>1:<input type="hidden" name="nombre_37" value="{{$puntuacion[36]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_37" class="form-control" value="{{$puntuacion[36]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>2:<input type="hidden" name="nombre_38" value="{{$puntuacion[37]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_38" class="form-control" value="{{$puntuacion[37]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>3:<input type="hidden" name="nombre_39" value="{{$puntuacion[38]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_39" class="form-control" value="{{$puntuacion[38]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>        
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">                      
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>14. Intestinos:</b></h5> <input type="hidden" name="titulo_14" value="{{$puntuacion[39]->nombre_puntuacion}}"> <input type="hidden" name="cont_14" value="7"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_40" value="{{$puntuacion[39]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_40" class="form-control" value="{{$puntuacion[39]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Enteritis (yeyuno):<input type="hidden" name="nombre_41" value="{{$puntuacion[40]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_41" class="form-control" value="{{$puntuacion[40]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                    
            <tr> <td>Equimosis:<input type="hidden" name="nombre_42" value="{{$puntuacion[41]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_42" class="form-control" value="{{$puntuacion[41]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                    
            <tr> <td>Desp. Mucosa:<input type="hidden" name="nombre_43" value="{{$puntuacion[42]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_43" class="form-control" value="{{$puntuacion[42]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                    
            <tr> <td>Enteritis mucoide:<input type="hidden" name="nombre_44" value="{{$puntuacion[43]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_44" class="form-control" value="{{$puntuacion[43]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                    
            <tr> <td>Transito Rápido:<input type="hidden" name="nombre_45" value="{{$puntuacion[44]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_45" class="form-control" value="{{$puntuacion[44]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                    
            <tr> <td>Gas / espuma:<input type="hidden" name="nombre_46" value="{{$puntuacion[45]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_46" class="form-control" value="{{$puntuacion[45]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                    
          </tbody>
        </table>          
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>15.- Coccidia:</b></h5> <input type="hidden" name="titulo_15" value="{{$puntuacion[46]->nombre_puntuacion}}"> <input type="hidden" name="cont_15" value="4"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Acervulina:<input type="hidden" name="nombre_47" value="{{$puntuacion[46]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_47" class="form-control" value="{{$puntuacion[46]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Máxima:<input type="hidden" name="nombre_48" value="{{$puntuacion[47]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_48" class="form-control" value="{{$puntuacion[47]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Tenella:<input type="hidden" name="nombre_49" value="{{$puntuacion[48]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_49" class="form-control" value="{{$puntuacion[48]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Necratix:<input type="hidden" name="nombre_50" value="{{$puntuacion[49]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_50" class="form-control" value="{{$puntuacion[49]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>          
    </div>
    </div>


 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>16. Ciegos ( Contenido)</b> <input type="hidden" name="titulo_16" value="{{$puntuacion[50]->nombre_puntuacion}}"> <input type="hidden" name="cont_16" value="6"></h5></td> </tr> 
          </thead>
          <tbody>
            <tr> <td>Normal:<input type="hidden" name="nombre_51" value="{{$puntuacion[50]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_51" class="form-control" value="{{$puntuacion[50]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Tiflitis Erosiva:<input type="hidden" name="nombre_52" value="{{$puntuacion[51]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_52" class="form-control" value="{{$puntuacion[51]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Placas diftéricas:<input type="hidden" name="nombre_53" value="{{$puntuacion[52]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_53" class="form-control" value="{{$puntuacion[52]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Gaseosos (cont):<input type="hidden" name="nombre_54" value="{{$puntuacion[53]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_54" class="form-control" value="{{$puntuacion[53]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Liquido (cont.):<input type="hidden" name="nombre_55" value="{{$puntuacion[54]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_55" class="form-control" value="{{$puntuacion[54]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Sangre (cont.):<input type="hidden" name="nombre_56" value="{{$puntuacion[55]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_56" class="form-control" value="{{$puntuacion[55]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>        
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">                      
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>17. Tonsilas Ileocecales:</b></h5> <input type="hidden" name="titulo_17" value="{{$puntuacion[56]->nombre_puntuacion}}"> <input type="hidden" name="cont_17" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Reactiva:<input type="hidden" name="nombre_57" value="{{$puntuacion[56]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_57" class="form-control" value="{{$puntuacion[56]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>No Reactiva:<input type="hidden" name="nombre_58" value="{{$puntuacion[57]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_58" class="form-control" value="{{$puntuacion[57]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>                                
          </tbody>
        </table>  

        <br>

        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>18. Placas de peyer:</b></h5> <input type="hidden" name="titulo_18" value="{{$puntuacion[58]->nombre_puntuacion}}"> <input type="hidden" name="cont_18" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Reactiva:<input type="hidden" name="nombre_59" value="{{$puntuacion[58]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_59" class="form-control" value="{{$puntuacion[58]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>No Reactiva:<input type="hidden" name="nombre_60" value="{{$puntuacion[59]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_60" class="form-control" value="{{$puntuacion[59]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>                  
    </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr> <td colspan="2"><h5><b>19. Necrosis cabeza de fémur</b></h5> <input type="hidden" name="titulo_19" value="{{$puntuacion[60]->nombre_puntuacion}}"> <input type="hidden" name="cont_19" value="2"></td> </tr>
          </thead>
          <tbody>
            <tr> <td>Presencia:<input type="hidden" name="nombre_61" value="{{$puntuacion[60]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_61" class="form-control" value="{{$puntuacion[60]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
            <tr> <td>Ausencia:<input type="hidden" name="nombre_62" value="{{$puntuacion[61]->nombre_detalle_puntuacion}}"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_62" class="form-control" value="{{$puntuacion[61]->estado}}" onclick='return limpia(this)' onBlur='return verificar(this)' disabled onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
          </tbody>
        </table>        
    </div>
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
    {!!Form::label('referencia','Referencia:')!!}     
      {!!Form::textarea('referencia',$sistema_integral->referencia,['rows'=>'4','class'=>'form-control','placeholder'=>'Referencia','disabled'])!!}<br>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      {!!Form::label('observaciones','Observaciones:')!!}     
      {!!Form::textarea('observaciones',$sistema_integral->observaciones,['rows'=>'3','class'=>'form-control','placeholder'=>'Observaciones','disabled'])!!}<br>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      {!!Form::label('comentarios','Comentarios:')!!}     
      {!!Form::textarea('comentarios',$sistema_integral->comentarios,['rows'=>'9','class'=>'form-control','placeholder'=>'Comentarios','disabled'])!!}<br>         
    </div>






<?php $cont=1; 
if ($sistema_integral->imagen1 != ""){ $cont++; } 
if ($sistema_integral->imagen2 != ""){ $cont++; } 
if ($sistema_integral->imagen3 != ""){ $cont++; } 
if ($sistema_integral->imagen4 != ""){ $cont++; } 
if ($sistema_integral->imagen5 != ""){ $cont++; } 
?>
<?php /*
if ($sistema_integral->imagen6 != ""){ $cont++; } 
if ($sistema_integral->imagen7 != ""){ $cont++; } 
if ($sistema_integral->imagen8 != ""){ $cont++; } 
if ($sistema_integral->imagen9 != ""){ $cont++; } 
if ($sistema_integral->imagen10 != ""){ $cont++; } 
*/ ?>

<input type="hidden" name="cont" id="cont" value="{{$cont}}">
  

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
    {!!Form::label('imagenes','Imagenes:')!!}   <br>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img1">
        <?php  if ($sistema_integral->imagen1 != "") { ?>
          <input type="hidden" name="imagen_1" id="imagen_1" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(1)" disabled="">
          <br/><center><output id="list_1"></output></center> 
        <?php $ruta_imagen1="invetsawebservice/".$sistema_integral->imagen1; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen1)}}" name="foto_1" id="foto_1" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_1" id="dir_imagen_1" value="{{$sistema_integral->imagen1}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_1" id="imagen_1" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(1)"><br>
          <center><output id="list_1"></output></center> <br> 
        <?php } ?>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img2">
        <?php  if ($sistema_integral->imagen2 != "") { ?>
          <input type="hidden" name="imagen_2" id="imagen_2" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(2)" disabled="">
          <br/><center><output id="list_2"></output></center> 
        <?php $ruta_imagen2="invetsawebservice/".$sistema_integral->imagen2; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen2)}}" name="foto_2" id="foto_2" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_2" id="dir_imagen_2" value="{{$sistema_integral->imagen2}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_2" id="imagen_2" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(2)"><br>
          <center><output id="list_2"></output></center>  <br>
        <?php } ?>          
      </div>      

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img3">
        <?php  if ($sistema_integral->imagen3 != "") { ?>
          <input type="hidden" name="imagen_3" id="imagen_3" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(3)" disabled="">
          <br/><center><output id="list_3"></output></center> 
        <?php $ruta_imagen3="invetsawebservice/".$sistema_integral->imagen3; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen3)}}" name="foto_3" id="foto_3" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_3" id="dir_imagen_3" value="{{$sistema_integral->imagen3}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_3" id="imagen_3" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(3)"><br>
          <center><output id="list_3"></output></center>  <br>
        <?php } ?>            
      </div>        
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_img4">    
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?php  if ($sistema_integral->imagen4 != "") { ?>
          <input type="hidden" name="imagen_4" id="imagen_4" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(4)" disabled="">
          <br/><center><output id="list_4"></output></center> 
        <?php $ruta_imagen4="invetsawebservice/".$sistema_integral->imagen4; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen4)}}" name="foto_4" id="foto_4" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_4" id="dir_imagen_4" value="{{$sistema_integral->imagen4}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_4" id="imagen_4" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(4)" disabled=""><br>
          <center><output id="list_4"></output></center>  <br>
        <?php } ?>              
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img5">
        <?php  if ($sistema_integral->imagen5 != "") { ?>
          <input type="hidden" name="imagen_5" id="imagen_5" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(5)" disabled="">
          <br/><center><output id="list_5"></output></center> 
        <?php $ruta_imagen5="invetsawebservice/".$sistema_integral->imagen5; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen5)}}" name="foto_5" id="foto_5" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_5" id="dir_imagen_5" value="{{$sistema_integral->imagen5}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_5" id="imagen_5" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(5)"><br>
          <center><output id="list_5"></output></center>  <br>
        <?php } ?>            
      </div>      
<?php /*
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img6">
        <?php  if ($sistema_integral->imagen6 != "") { ?>
          <input type="hidden" name="imagen_6" id="imagen_6" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(6)" disabled="">
          <br/><center><output id="list_6"></output></center> 
        <?php $ruta_imagen6="invetsawebservice/".$sistema_integral->imagen6; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen6)}}" name="foto_6" id="foto_6" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_6" id="dir_imagen_6" value="{{$sistema_integral->imagen6}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_6" id="imagen_6" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(6)"><br>
          <center><output id="list_6"></output></center>  <br>
        <?php } ?>          
      </div>        
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img7">
        <?php  if ($sistema_integral->imagen7 != "") { ?>
          <input type="hidden" name="imagen_7" id="imagen_7" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(7)" disabled="">
          <br/><center><output id="list_7"></output></center> 
        <?php $ruta_imagen7="invetsawebservice/".$sistema_integral->imagen7; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen7)}}" name="foto_7" id="foto_7" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_7" id="dir_imagen_7" value="{{$sistema_integral->imagen7}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_7" id="imagen_7" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(7)"><br>
          <center><output id="list_7"></output></center>  <br>
        <?php } ?>          
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img8">
        <?php  if ($sistema_integral->imagen8 != "") { ?>
          <input type="hidden" name="imagen_8" id="imagen_8" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(8)" disabled="">
          <br/><center><output id="list_8"></output></center> 
        <?php $ruta_imagen8="invetsawebservice/".$sistema_integral->imagen8; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen8)}}" name="foto_8" id="foto_8" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_8" id="dir_imagen_8" value="{{$sistema_integral->imagen8}}">      <br> 
        <?php } else{ ?>  
          <input type="file" name="imagen_8" id="imagen_8" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(8)"><br>
          <center><output id="list_8"></output></center>  <br>
        <?php } ?>    
      </div>      

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img9">
        <?php  if ($sistema_integral->imagen9 != "") { ?>
          <input type="hidden" name="imagen_9" id="imagen_9" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(9)" disabled="">
          <br/><center><output id="list_9"></output></center> 
        <?php $ruta_imagen9="invetsawebservice/".$sistema_integral->imagen9; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen9)}}" name="foto_9" id="foto_9" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_9" id="dir_imagen_9" value="{{$sistema_integral->imagen9}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_9" id="imagen_9" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(9)"><br>
          <center><output id="list_9"></output></center>  <br>
        <?php } ?>        
    </div>    


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img10">
        <?php  if ($sistema_integral->imagen10 != "") { ?>
          <input type="hidden" name="imagen_10" id="imagen_10" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(10)" disabled="">
          <br/><center><output id="list_10"></output></center> 
        <?php $ruta_imagen10="invetsawebservice/".$sistema_integral->imagen10; ?>
          <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen10)}}" name="foto_10" id="foto_10" width="350px" height="250px"></center>
          <input type="hidden" name="dir_imagen_10" id="dir_imagen_10" value="{{$sistema_integral->imagen10}}">       <br>
        <?php } else{ ?>  
          <input type="file" name="imagen_10" id="imagen_10" class="form-control" style="cursor: pointer;" accept="image/*" onclick="id_img(10)"><br>
          <center><output id="list_10"></output></center>  <br>
        <?php } ?>      
      </div>    */ ?>
    </div>


  <?php if ($sistema_integral->imagen_jefe != "" ||  $sistema_integral->firma_invetsa != "" && $sistema_integral->firma_empresa != ""): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_imagenes">   
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br><center>{!!Form::label('imagen_jefe','Imagen Del Responsable:')!!}
        <input type="hidden" name="imagen_jefe" id="imagen_jefe" class="form-control" readonly=""><br/>
        <?php $ruta_foto_jefe="invetsawebservice/".$sistema_integral->imagen_jefe; ?>
        <img src="data:image/jpeg;base64,{{file_get_contents($ruta_foto_jefe)}}" width="350px" height="250px"></center>
    </div> 


    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
      <center>{!!Form::label('firma_empresa','Firma del Responsable:')!!}
      <input type="hidden" name="firma_empresa" id="firma_empresa" class="form-control" readonly=""><br/>
        <?php $ruta_firma_empresa="invetsawebservice/".$sistema_integral->firma_empresa; ?>
      <img src="data:image/jpeg;base64,{{file_get_contents($ruta_firma_empresa)}}" width="350px" height="250px"></center>        
    </div> 

    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
      <center>{!!Form::label('firma_invetsa','Firma de Invetsa:')!!}
      <input type="hidden" name="firma_invetsa" id="firma_invetsa" class="form-control" readonly=""><br/>
        <?php $ruta_firma_invetsa="invetsawebservice/".$sistema_integral->firma_invetsa; ?>
      <img src="data:image/jpeg;base64,{{file_get_contents($ruta_firma_invetsa)}}" width="350px" height="250px"></center> <br>
    </div>     
         
    </div>
  <?php endif ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
      <div align="right">
      <!--button type="button" class="btn btn-success" id="btn_actualizar" onclick="btn_esconder()"><i class="fa fa-file-text" aria-hidden="true"></i> <b>IMPRIMIR</b></button-->         
      <a href="{!!URL::to('GuardarSIM')!!}" class="btn btn-warning"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> <b>VOLVER</b></a>
    </div>  
    {!!Form::close()!!}
    </div>
</div>
   {!!Html::script('js/SIMUpdate.js')!!}
@endsection