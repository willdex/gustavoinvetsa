{!!Html::script('js/jQuery-2.1.4.min.js')!!}
{!!Html::style('css/bootstrap.css')!!}
{!!Html::style('css/font-awesome.css')!!}
{!!Html::style('css/AdminLTE.css')!!}
{!!Html::style('css/_all-skins.css')!!}
{!!Html::style('css/alertify.css')!!}
{!!Html::style('css/default.css')!!}

@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
 <br>
<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">	

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<font size="6">ADMINISTRADORES</font>
	</div>


	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
		<div class="pull-right">
			<a class="btn btn-success" href="{!!URL::to('administrador/create')!!}">REGISTRAR</a> 
		</div>
	</div>
	<br><br>
   
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<th><center>NOMBRE</center></th>
			<th><center>APELLIDOS</center></th>
			<th><center>USUARIO</center></th>
			<th><center>OPCION</center></th>
			
		</thead>

		<tbody align="center" id="body_user">
		@foreach($administrador as $user)				
		<tr>
			<td>{{ $user->nombre}}</td>
			<td>{{ $user->apellido}}</td>
			<td>{{ $user->usuario}}</td>
			<td>
			<?php /*<button class="btn btn-primary" data-toggle="modal" data-target="#ModalUsuario" onclick="CargarUsuario({{$user->id}})">VER MAS</button>*/ ?>
			{!!link_to_route('administrador.edit', $title = 'ACTUALIZAR', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!} 
			</td>
			</tr>
		@endforeach
		</tbody>

		<tbody align="center" id="body_user_2">
		</tbody>
	</table>

	{!!$administrador->render()!!}  

		</div>
	</div>
</div>
   <?php //{!!Html::script('js/administrador.js')!!} ?>

{!!Html::script('js/herramientas.js')!!}
{!!Html::script('js/bootstrap.js')!!}
{!!Html::script('js/alertify.js')!!}
{!!Html::script('js/app.js')!!}