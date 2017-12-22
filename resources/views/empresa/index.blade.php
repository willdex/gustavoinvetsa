@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
@include('alerts.cargando')

<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive" style="overflow-x:inherit">	

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<font size="5" color="red"><b>EMPRESAS</b></font>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	    <select name="id_empresa" class="form-control selectpicker" id="id_empresa" data-live-search="true" >
	     <option value="">BUSCAR EMPRESA...                                   </option>
	        @foreach($buscar_empresa as $emp)
	        <option value="{{$emp->id}}">{{$emp->nombre}}</option>
	        @endforeach
	    </select>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
		<div class="pull-right">
			<a class="btn btn-success" title="AGREGAR EMPRESA" href="{!!URL::to('empresa/create')!!}"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a> 
		</div>
	</div>
	<br><br>

<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<th><center>EMPRESA</center></th>
		<th><center>DIRECCION</center></th>
		<th><center>CIUDAD</center></th>
		<th><center>OPCION</center></th>
	</thead>

	<tbody align="center" id="body_empresa">
	@foreach($empresa as $emp)
	<tr>
		<td>{{$emp->nombre}}</td>
		<td>{{$emp->direccion}}</td>
		<td>{{$emp->ciudad}}</td>
		<td>
		<a class="btn btn-primary" title="ACTUALIZAR" href="empresa/{{$emp->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
		<a class="btn btn-warning" title="AGREGAR GRANJA" href="empresa/{{$emp->id}}"><i class="fa fa-home" aria-hidden="true"></i></a> 
		</td>
		</tr>
	@endforeach
	</tbody>

	<tbody align="center" id="body_empresa_2">
	</tbody>
</table>

<div class="pull-left" id="div_render">	{!!$empresa->render()!!}  </div>
<div class="pull-right"><button class="btn btn-default" id="mostrar" onclick="ver_todos()"><b>VER TODOS</b></button>  </div>

		</div>
	</div>
</div>
   {!!Html::script('js/empresa.js')!!}
@endsection
