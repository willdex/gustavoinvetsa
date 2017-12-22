@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')

<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive" style="overflow-x:inherit">	

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<font size="6">EMPRESA</font>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	    <select name="id_usuario" class="form-control selectpicker" id="id_usuario" data-live-search="true" >
	     <option value="">BUSCAR EMPRESA...                                   </option>
	        @foreach($buscar_empresa as $emp)
	        <option value="{{$emp->id}}">{{$emp->nombre}}</option>
	        @endforeach
	    </select>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
		<div class="pull-right">
			<a class="btn btn-success" href="{!!URL::to('empresa/create')!!}">REGISTRAR</a> 
		</div>
	</div>
	<br><br>

<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<th><center>NOMBRE</center></th>
		<th><center>OPCION</center></th>
	</thead>

	<tbody align="center" id="body_user">
	@foreach($emprresa as $emp)
	<tr>
		<td>{{$emp->nombre}}</td>
		<td>
		{!!link_to_route('usuario.edit', $title = 'ACTUALIZAR', $parameters = $emp->id, $attributes = ['class'=>'btn btn-primary'])!!} 
		</td>
		</tr>
	@endforeach
	</tbody>

	<tbody align="center" id="body_user_2">
	</tbody>
</table>

<div class="pull-left">	{!!$usuario->render()!!}  </div>
<div class="pull-right">	<button class="btn btn-default" id="mostrar" onclick="ver_todos()"><b>VER TODOS</b></button>  </div>

		</div>
	</div>
</div>
   {!!Html::script('js/usuario.js')!!}
@endsection
