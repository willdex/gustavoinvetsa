@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
@include('alerts.cargando')

<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<font size="4" color="red"><b>SISTEMA INTEGRAL DE MONITOREO</b></font>
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
	            <button type="button" title="BUSCAR" class="btn btn-info" onclick="Buscar_SIM()"><i class="fa fa-search" aria-hidden="true"></i></button>
			</div>
		</div>        

		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 pull-right">
			<div class="pull-right">
				<a class="btn btn-success" title="AGREGAR" href="{!!URL::to('GuardarSIM/create')!!}"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a> 
			</div>
		</div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br>
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<th><center>FECHA</center></th>
			<th><center>TECNICO</center></th>
			<th><center>EMPRESA</center></th>
			<th><center>GRANJA</center></th>
			<th><center>GALPON</center></th>
			<th><center>ZONA</center></th>
			<th><center>EDAD</center></th>
			<th><center>SEXO</center></th>
			<th><center>NRO POLLOS</center></th>
			<th><center>OPCION</center></th>
		</thead>

		<tbody align="center" id="body_sim">
		@foreach($sistema_integral as $sim)

		<?php switch ($sim->sexo) {
		    case 'F':
		        $sexo="Hembra";
		        break;
		    case 'M':
		        $sexo="Macho";
		        break;
		    case '0':
		        $sexo="Mixto";
		        break;		        		    
		}
 		?>
		<tr>
			<td>{{$sim->fecha}}</td>
			<td>{{$sim->tecnico}}</td>
			<td>{{$sim->empresa}}</td>
			<td>{{$sim->granja}}</td>
			<td>{{$sim->galpon}}</td>
			<td>{{$sim->zona}}</td>
			<td>{{$sim->edad}}</td>
			<td>{{$sexo}}</td>
			<td>{{$sim->nro_pollos}}</td>
			<td>
			<a class="btn btn-primary" title="ACTUALIZAR" href="GuardarSIM/{{$sim->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>     
			<a class="btn btn-warning" title="VER REGISTRO" href="GuardarSIM/{{$sim->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>     
			<a class="btn btn-success" title="PDF" href="SIM_PDF/{{$sim->id}}" target="_blanck"><i class="fa fa-file" aria-hidden="true"></i></a> 
			</td>
			</tr>
		@endforeach
		</tbody>

		<tbody align="center" id="body_sim_2">
		</tbody>
	</table>
	</div>


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pull-left" id="div_render"><?php //	{!!$sistema_integral->render()!!} ?>  </div>
		<div class="pull-right"><button class="btn btn-default" id="mostrar" onclick="ver_todos()"><b>VER TODOS</b></button>  </div>
	</div>
</div>
   {!!Html::script('js/SIM.js')!!}
@endsection
