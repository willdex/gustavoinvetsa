@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
@include('alerts.cargando')

<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive" style="overflow-x:inherit">	

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<font size="5" color="red"><b>{{$granja[0]->nombre}}</b></font>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	    <select name="id_galpon" class="form-control selectpicker" id="id_galpon" data-live-search="true" >
	     <option value="">BUSCAR GALPON...                                   </option>
	        @foreach($buscar_galpon as $gal)
	        <option value="{{$gal->id}}">{{$gal->codigo}}</option>
	        @endforeach
	    </select>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
		<div class="pull-right">
			<a class="btn btn-success" title="AGREGAR GALPON" href="{!!URL::to('galpon/create')!!}"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>        
			<a class="btn btn-danger" title="VOLVER ATRAS" href="../empresa/{{Session::get('idEmpresa')}}"><i class="fa fa-reply fa-2x" aria-hidden="true"></i></a> 
		</div>
	</div>
	<br><br>

<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<th><center>CODIGO GALPON</center></th>
		<th><center>CANTIDAD DE POLLOS</center></th>
		<th><center>OPCION</center></th>
	</thead>

	<tbody align="center" id="body_galpon">
	@foreach($galpon as $gal)
	<tr>
		<td>{{$gal->codigo}}</td>
		<td>{{$gal->cantidad_pollo}}</td>
		<td>
		<a class="btn btn-primary" title="ACTUALIZAR" href="../galpon/{{$gal->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
		</td>
		</tr>
	@endforeach
	</tbody>

	<tbody align="center" id="body_galpon_2">
	</tbody>
</table>

<div class="pull-left" id="div_render">	{!!$galpon->render()!!}  </div>
<div class="pull-right"><button class="btn btn-default" id="mostrar" onclick="ver_todos()"><b>VER TODOS</b></button>  </div>

		</div>
	</div>
</div>
{!!Html::script('js/galpon.js')!!}
@endsection
