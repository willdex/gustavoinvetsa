@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
@include('alerts.cargando')

<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<font size="4" color="red"><b>INFORME DE SERVICIO DE MANTENIMIENTO - ZOOTEC</b></font>
		</div>
		<?php $fecha=DB::select("SELECT curdate()as fecha"); ?>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" align="right">
            <b>Fecha Inicio:</b>         
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class='input-group date' id='datetimepicker10'>
              <input type='text' class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{$fecha[0]->fecha}}" style="font-size:18px;text-align:left" />
              <span class="input-group-addon ">
                 <span class="fa fa-calendar" aria-hidden="true"></span> 
              </span>
            </div>
        </div>

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" align="right">
            <b>Fecha Fin:</b>         
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class='input-group date' id='datetimepicker11'>
              <input type='text' class="form-control" id="fecha_fin" name="fecha_fin" value="{{$fecha[0]->fecha}}" style="font-size:18px;text-align:left" />
              <span class="input-group-addon ">
                 <span class="fa fa-calendar" aria-hidden="true"></span> 
              </span>
            </div>
        </div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 pull-left">
			<div class="pull-left">
	            <button type="button" title="BUSCAR" class="btn btn-info" onclick="Buscar_Zootec()"><i class="fa fa-search" aria-hidden="true"></i></button>
			</div>
		</div>        

	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br>
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<th><center>FECHA</center></th>
			<th><center>REVISION</center></th>
			<th><center>TECNICO</center></th>
			<th><center>COMPAÑIA</center></th>
			<th><center>DIRECCION</center></th>
			<th><center>CODIGO MAQUINA</center></th>
			<th><center>JEFE DE PLANTA</center></th>
			<th><center>PDF</center></th>
		</thead>

		<tbody align="center" id="body_sim">
		@foreach($zootec as $zoo)

		<tr>
			<td>{{$zoo->fecha}}</td>
			<td>{{$zoo->revision}}</td>
			<td>{{$zoo->tecnico}}</td>
			<td>{{$zoo->compania}}</td>
			<td>{{$zoo->direccion_compania}}</td>
			<td>{{$zoo->codigo_maquina}}</td>
			<td>{{$zoo->jefe_planta}}</td>
			<td>   
			<a class="btn btn-success" title="PDF" href="MantenimientoZootec_PDF/{{$zoo->id}}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a> 
			</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pull-left" id="div_render">{!!$zootec->render()!!}  </div>
	</div>
</div>

   {!!Html::script('js/zootec.js')!!}
@endsection
