@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.cargando')
@include('alerts.success')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<H4 style="color:red"><b>REGISTTRO DE SISTEMA INTEGRAL DE MONITOREO</b></H4>    
		@include('alerts.request')    
		{!!Form::open(['route'=>'GuardarSIM.store','method'=>'POST','enctype'=>'multipart/form-data','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;','onsubmit'=>'javascript: return Validar_SIM_Guardar()'])!!}			

	    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		    <div class="form-group" id="div_empresa">
		        {!!Form::label('empresa','Empresa:')!!}
		        {!!Form::select('empresa',$empresa,null,['id'=>'empresa','class'=>'form-control selectpicker','placeholder'=>'Seleccione Una Empresa','data-live-search'=>'true'])!!}
		    </div>	  
		    <div class="form-group" id="div_granja">
		        {!!Form::label('granja','Granja:')!!}
		        <select id="granja" name="granja" class="form-control" placeholder="Seleccione Una Granja"></select>
		    </div>	  		      		      
		</div>

	    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">  		      		      
		    <div class="form-group" id="div_zona">
		        {!!Form::label('zona','Zona:')!!}
		        {!!Form::text('zona',null,['class'=>'form-control','placeholder'=>'Zona','readonly'])!!}
		    </div>	
		    <div class="form-group" id="div_galpon">
		        {!!Form::label('galpon','Galpon:')!!}
		        <select id="galpon" name="galpon" class="form-control"></select>
		    </div>			    
		</div>

	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		    <div class="form-group" id="div_edad">
		        {!!Form::label('edad','Edad:')!!}
		        {!!Form::text('edad',0,['class'=>'form-control','style'=>'text-align: center;font-size: 13pt','onkeypress'=>'return bloqueo_de_punto(event)','maxlength'=>'2','onclick'=>'return limpia(this)', 'onBlur'=>'return verificar(this)'])!!}
		        <?php //{!!Form::select('edad',array('14'=>'14','21'=>'21','25'=>'25','28'=>'28','35'=>'35','42'=>'42'),null,['id'=>'edad','class'=>'form-control','placeholder'=>'Seleccione Una Edad'])!!} ?>
		    </div>		
		    <div class="form-group" id="div_sexo">
		        {!!Form::label('sexo','Sexo:')!!}
		        {!!Form::select('sexo',array('F'=>'Hembra','M'=>'Macho','0'=>'Mixto'),null,['id'=>'sexo','class'=>'form-control','placeholder'=>'Seleccione Un Sexo'])!!}
		    </div>		        
		</div>

	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">	
		    <div class="form-group" id="div_nro_pollos">
		        {!!Form::label('nro_pollos','Nro de Pollos:')!!}
		        {!!Form::number('nro_pollos',null,['class'=>'form-control','style'=>'font-size: 13pt','placeholder'=>'Nro de Pollos','onkeypress'=>'return bloqueo_de_punto(event)'])!!}
		    </div>	

		    <div class="form-group" id="div_fecha">
		        {!!Form::label('fecha','Fecha:')!!}
		        <?php $fecha=DB::select("SELECT curdate() as fecha"); ?>
	            <div class='input-group date' id='datetimepicker10'>
	              <input type='text' class="form-control" id="fecha" name="fecha" value="{{$fecha[0]->fecha}}" style="font-size:15px;text-align:left" />
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
      	<thead style="background-color: #00993b; color: white;">
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
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_1" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_1" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_1" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_1" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_1" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_1" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_1" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_1" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_1" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>      		      			
      		</tr>
      		<tr align="center">
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_2" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_2" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_2" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_2" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_2" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_2" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_2" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_2" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_2" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>       			
      		</tr>
      		<tr align="center">
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_3" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_3" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_3" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_3" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_3" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_3" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_3" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_3" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_3" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>      			
      		</tr>  
      		<tr align="center">
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_4" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_4" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_4" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_4" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_4" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_4" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_4" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_4" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_4" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>       			
      		</tr>  
      		<tr align="center">
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_5" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_5" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_5" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_5" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_5" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_5" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_5" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_5" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_5" onkeypress="return numerosmasdecimal(event)" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'></td>       			
      		</tr>  
      		<tr align="center" style="background: #00993b">
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_corporal_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bursa_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_bazo_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_timo_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="peso_higado_6" onkeypress="return numerosmasdecimal(event)"  readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_bursal_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_timico_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="indice_hepatico_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>
      			<td><input type="text" style="text-align: center;font-size: 15pt" class="form-control" name="bursometro_6" onkeypress="return numerosmasdecimal(event)" readonly value="0"></td>       			
      		</tr>        		      		      		    		      		
      	</tbody>
      </table>	        
      </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>1.-Pico(aftas)</b></h5> <input type="hidden" name="titulo_1" value="Pico(aftas)"> <input type="hidden" name="cont_1" value="4"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Comisura:<input type="hidden" name="nombre_1" value="Comisura"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_1" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Paladar Duro:<input type="hidden" name="nombre_2" value="Paladar Duro"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_2" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Paladar Blando:<input type="hidden" name="nombre_3" value="Paladar Blando"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_3" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Necrosis de la punta de la lengua:<input type="hidden" name="nombre_4" value="Necrosis de la punta de la lengua"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_4" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	      
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  		      		      
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>2.-Petequias</b></h5> <input type="hidden" name="titulo_2" value="Petequias"> <input type="hidden" name="cont_2" value="3"> </td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Pechuga:<input type="hidden" name="nombre_5" value="Pechuga"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_5" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Pierna:<input type="hidden" name="nombre_6" value="Pierna"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_6" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Esternón:<input type="hidden" name="nombre_7" value="Esternon"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_7" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>			    
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>3.- Tarsos</b></h5> <input type="hidden" name="titulo_3" value="Tarsos"> <input type="hidden" name="cont_3" value="3"> </td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Frágil:<input type="hidden" name="nombre_8" value="Fragil"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_8" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Flexible:<input type="hidden" name="nombre_9" value="Flexible"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_9" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Duro:<input type="hidden" name="nombre_10" value="Duro"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_10" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	        
		</div>
    </div>




    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>4. Relación Morfométrica Bursa / Bazo:</b></h5> <input type="hidden" name="titulo_4" value="Relacion Morfometrica Bursa / Bazo"> <input type="hidden" name="cont_4" value="3"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>A favor de la Bursa:<input type="hidden" name="nombre_11" value="A favor de la Bursa"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_11" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>A favor del Bazo:<input type="hidden" name="nombre_12" value="A favor del Bazo"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_12" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Relación 1 / 1:<input type="hidden" name="nombre_13" value="Relación 1 / 1"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_13" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	      
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  		      		      
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>5. Apariencia de los pliegues internos de la bursa:</b></h5> <input type="hidden" name="titulo_5" value="Apariencia de los pliegues internos de la bursa"> <input type="hidden" name="cont_5" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_14" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_14" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Anormal:<input type="hidden" name="nombre_15" value="Anormal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_15" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>			    
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>6. Tamaño y apariencia del Timo:</b></h5> <input type="hidden" name="titulo_6" value="Tamano y apariencia del Timo"> <input type="hidden" name="cont_6" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_16" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_16" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Anormal:<input type="hidden" name="nombre_17" value="Anormal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_17" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	        
		</div>
    </div>





    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>7. Sacos aéreos:</b></h5> <input type="hidden" name="titulo_7" value="Sacos aereos"> <input type="hidden" name="cont_7" value="3"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normales:<input type="hidden" name="nombre_18" value="Normales"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_18" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Aerosaculitis Abdominal:<input type="hidden" name="nombre_19" value="Aerosaculitis Abdominal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_19" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Aerosaculitis Torácica:<input type="hidden" name="nombre_20" value="Aerosaculitis Toracica"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_20" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	      
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  		      		      
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>8. Tráquea:</b></h5> <input type="hidden" name="titulo_8" value="Traquea"> <input type="hidden" name="cont_8" value="4"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_21" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_21" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Congestionada:<input type="hidden" name="nombre_22" value="Congestionada"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_22" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Hemorrágica:<input type="hidden" name="nombre_23" value="Hemorragica"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_23" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Con mucosidad:<input type="hidden" name="nombre_24" value="Con mucosidad"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_24" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>	      			      		
	      	</tbody>
	      </table>			    
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>9. Cornetes Nasales:</b></h5> <input type="hidden" name="titulo_9" value="Cornetes Nasales"> <input type="hidden" name="cont_9" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_25" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_25" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Congestionado:<input type="hidden" name="nombre_26" value="Congestionado"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_26" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	        
		</div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>10. Hígados:</b></h5> <input type="hidden" name="titulo_10" value="Higados"> <input type="hidden" name="cont_10" value="5"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_27" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_27" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Inflamado:<input type="hidden" name="nombre_28" value="Inflamado"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_28" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Pálido y friable:<input type="hidden" name="nombre_29" value="Palido y friable"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_29" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Moteado:<input type="hidden" name="nombre_30" value="Moteado"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_30" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Punto de exudado:<input type="hidden" name="nombre_31" value="Punto de exudado"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_31" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	      
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  		      		      
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>11.Vesicula Biliar:</b></h5> <input type="hidden" name="titulo_11" value="Vesicula Biliar"> <input type="hidden" name="cont_11" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Llena:<input type="hidden" name="nombre_32" value="Llena"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_32" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Vacía:<input type="hidden" name="nombre_33" value="Vacia"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_33" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      		
	      	</tbody>
	      </table>			    
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>12. Proventrículo:</b></h5> <input type="hidden" name="titulo_12" value="Proventriculo"> <input type="hidden" name="cont_12" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_34" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_34" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Proventriculitis:<input type="hidden" name="nombre_35" value="Proventriculitis"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_35" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	        
		</div>
    </div>





    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>13. Ulceración de Mollejas:</b></h5> <input type="hidden" name="titulo_13" value="Ulceracion de Mollejas"> <input type="hidden" name="cont_13" value="4"></td> </tr>
	      		<tr align="center"> <td><h6><b>Grado:</b></h5></td> <td><h6><b>Cantidad:</b></h5></td></tr> 	
	      	</thead>
	      	<tbody>
	      		<tr> <td>0:<input type="hidden" name="nombre_36" value="0"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_36" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>1:<input type="hidden" name="nombre_37" value="1"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_37" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>2:<input type="hidden" name="nombre_38" value="2"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_38" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>3:<input type="hidden" name="nombre_39" value="3"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_39" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	      
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  		      		      
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>14. Intestinos:</b></h5> <input type="hidden" name="titulo_14" value="Intestinos"> <input type="hidden" name="cont_14" value="7"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_40" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_40" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Enteritis (yeyuno):<input type="hidden" name="nombre_41" value="Enteritis (yeyuno)"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_41" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      		
	      		<tr> <td>Equimosis:<input type="hidden" name="nombre_42" value="Equimosis"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_42" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      		
	      		<tr> <td>Desp. Mucosa:<input type="hidden" name="nombre_43" value="Desp. Mucosa"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_43" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      		
	      		<tr> <td>Enteritis mucoide:<input type="hidden" name="nombre_44" value="Enteritis mucoide"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_44" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      		
	      		<tr> <td>Transito Rápido:<input type="hidden" name="nombre_45" value="Transito Rapido"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_45" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      		
	      		<tr> <td>Gas / espuma:<input type="hidden" name="nombre_46" value="Gas / espuma"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_46" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      		
	      	</tbody>
	      </table>			    
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>15.- Coccidia:</b></h5> <input type="hidden" name="titulo_15" value="Coccidia"> <input type="hidden" name="cont_15" value="4"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Acervulina:<input type="hidden" name="nombre_47" value="Acervulina"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_47" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Máxima:<input type="hidden" name="nombre_48" value="Maxima"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_48" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Tenella:<input type="hidden" name="nombre_49" value="Tenella"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_49" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Necratix:<input type="hidden" name="nombre_50" value="Necratix"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_50" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	        
		</div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>16. Ciegos ( Contenido)</b> <input type="hidden" name="titulo_16" value="Ciegos ( Contenido)"> <input type="hidden" name="cont_16" value="6"></h5></td> </tr>	
	      	</thead>
	      	<tbody>
	      		<tr> <td>Normal:<input type="hidden" name="nombre_51" value="Normal"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_51" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Tiflitis Erosiva:<input type="hidden" name="nombre_52" value="Tiflitis Erosiva"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_52" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Placas diftéricas:<input type="hidden" name="nombre_53" value="Placas diftericas"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_53" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Gaseosos (cont):<input type="hidden" name="nombre_54" value="Gaseosos (cont)"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_54" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Liquido (cont.):<input type="hidden" name="nombre_55" value="Liquido (cont.)"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_55" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Sangre (cont.):<input type="hidden" name="nombre_56" value="Sangre (cont.)"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_56" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>	      
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  		      		      
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>17. Tonsilas Ileocecales:</b></h5> <input type="hidden" name="titulo_17" value="Tonsilas Ileocecales"> <input type="hidden" name="cont_17" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Reactiva:<input type="hidden" name="nombre_57" value="Reactiva"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_57" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>No Reactiva:<input type="hidden" name="nombre_58" value="No Reactiva"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_58" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>     			      					      
	      	</tbody>
	      </table>	

	      <br>

	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>18. Placas de peyer:</b></h5> <input type="hidden" name="titulo_18" value="Placas de peyer"> <input type="hidden" name="cont_18" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Reactiva:<input type="hidden" name="nombre_59" value="Reactiva"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_59" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>No Reactiva:<input type="hidden" name="nombre_60" value="No Reactiva"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_60" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>		      		    
		</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	      <table class="table table-striped table-bordered table-condensed table-hover">
	      	<thead>
	      		<tr> <td colspan="2"><h5><b>19. Necrosis cabeza de fémur</b></h5> <input type="hidden" name="titulo_19" value="Necrosis cabeza de femur"> <input type="hidden" name="cont_19" value="2"></td> </tr>
	      	</thead>
	      	<tbody>
	      		<tr> <td>Presencia:<input type="hidden" name="nombre_61" value="Presencia"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_61" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      		<tr> <td>Ausencia:<input type="hidden" name="nombre_62" value="Ausencia"></td> <td><input type="text" style="text-align: center;font-size: 15pt" name="valor_62" class="form-control" value="0" onclick='return limpia(this)' onBlur='return verificar(this)' onKeypress="if(event.keyCode == 13) event.returnValue = false;"></td> </tr>
	      	</tbody>
	      </table>        
		</div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
		{!!Form::label('referencia','Referencia:')!!}    	
    	<textarea name="referencia" id="referencia" class="form-control" rows="4" placeholder="Referencia"></textarea><br>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
		{!!Form::label('observaciones','Observaciones:')!!}    	
    	<textarea name="observaciones" id="observaciones" class="form-control" rows="3" placeholder="Observaciones"></textarea><br>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
		{!!Form::label('comentarios','Comentarios:')!!}    	
    	<textarea name="comentarios" id="comentarios" class="form-control" rows="7" placeholder="Comentarios"></textarea><br>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
		{!!Form::label('imagenes','Imagenes:')!!}    <button type="button" title="AGREGAR IMAGEN" class="btn btn-success" onclick="add_imagen()"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>     <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> </button>	          
		    <button type="button" title="AGREGAR IMAGEN" class="btn btn-danger" onclick="eliminar_imagen()"><i class="fa fa-trash fa-2x" aria-hidden="true"></i>     <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> </button><br> <br>
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img1" hidden="">
			<input type="file" name="imagen_1" id="imagen_1" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(1)">
		    <br/><output id="list_1"></output>		<br>	
    	</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img2" hidden="">
			<input type="file" name="imagen_2" id="imagen_2" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(2)">
		    <br/><output id="list_2"></output>	<br>	
    	</div>    	

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img3" hidden="">
			<input type="file" name="imagen_3" id="imagen_3" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(3)">
		    <br/><output id="list_3"></output>	<br>	
    	</div>      	
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_img4" hidden="">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<input type="file" name="imagen_4" id="imagen_4" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(4)">
		    <br/><output id="list_4"></output>	<br>		
    	</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img5" hidden="">
			<input type="file" name="imagen_5" id="imagen_5" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(5)">
		    <br/><output id="list_5"></output>		<br>
    	</div>    	

	    <?php /*<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img6" hidden="">
			<input type="file" name="imagen_6" id="imagen_6" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(6)">
		    <br/><output id="list_6"></output>	<br>	
    	</div>      */ ?>	
    </div>

<?php /*
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img7" hidden="">
			<input type="file" name="imagen_7" id="imagen_7" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(7)">
		    <br/><output id="list_7"></output>	<br>		
    	</div>

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img8" hidden="">
			<input type="file" name="imagen_8" id="imagen_8" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(8)">
		    <br/><output id="list_8"></output>	<br>	
    	</div>    	

	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img9" hidden="">
			<input type="file" name="imagen_9" id="imagen_9" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(9)">
		    <br/><output id="list_9"></output>	<br>	
    	</div>      	
    </div>    


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_img10" hidden="">
			<input type="file" name="imagen_10" id="imagen_10" style="cursor: pointer;" accept="image/*" class="form-control" onclick="id_img(10)">
		    <br/><output id="list_10"></output>	<br>		
    	</div>  	
    </div>*/ ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
		<div align="right">
			<button type="submit" class="btn btn-primary" id="btn_registrar" onclick="btn_esconder()"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>REGISTRAR</b></button>         
			<a href="{!!URL::to('GuardarSIM/create')!!}" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>CANCELAR</b></a>        
			<a href="{!!URL::to('GuardarSIM')!!}" class="btn btn-warning"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> <b>VOLVER</b></a>
		</div>		
		{!!Form::close()!!}
    </div>
</div>
   {!!Html::script('js/SIMGuardar.js')!!}
@endsection