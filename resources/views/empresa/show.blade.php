@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
@include('alerts.cargando')

<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive" style="overflow-x:inherit">	

	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
		<font size="4" color="red"><b>EMPRESA: {{$empresa[0]->nombre}}</b></font>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	    <select name="id_granja" class="form-control selectpicker" id="id_granja" data-live-search="true" >
	     <option value="">BUSCAR GRANJA...                                   </option>
	        @foreach($buscar_granja as $gra)
	        <option value="{{$gra->id}}">{{$gra->nombre}}</option>
	        @endforeach
	    </select>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right">
		<div class="pull-right">
			<a class="btn btn-success" title="AGREGAR GRANJA" href="{!!URL::to('granja/create')!!}"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>        
			<a class="btn btn-danger" title="VOLVER ATRAS" href="{!!URL::to('empresa')!!}"><i class="fa fa-reply fa-2x" aria-hidden="true"></i></a> 
		</div>
	</div>
	<br><br>

<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<th><center>GRANJA</center></th>
		<th><center>ZONA</center></th>
		<th><center>OPCION</center></th>
	</thead>

	<tbody align="center" id="body_granja">
	@foreach($granja as $gra)
	<tr>
		<td>{{$gra->nombre_granja}}</td>
		<td>{{$gra->zona}}</td>
		<td>
		<a class="btn btn-primary" title="ACTUALIZAR" href="../granja/{{$gra->id_granja}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
		<a class="btn btn-warning" title="AGREGAR GALPON" href="../granja/{{$gra->id_granja}}"><i class="fa fa-university" aria-hidden="true"></i></a> 
		</td>
		</tr>
	@endforeach
	</tbody>

	<tbody align="center" id="body_granja_2">
	</tbody>
</table>

<div class="pull-left" id="div_render">	{!!$granja->render()!!}  </div>
<div class="pull-right"><button class="btn btn-default" id="mostrar" onclick="ver_todos()"><b>VER TODOS</b></button>  </div>

		</div>
	</div>
</div>
{!!Html::script('js/granja.js')!!}
@endsection
