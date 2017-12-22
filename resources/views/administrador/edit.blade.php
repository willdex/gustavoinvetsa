{!!Html::script('js/jQuery-2.1.4.min.js')!!}
{!!Html::style('css/bootstrap.css')!!}
{!!Html::style('css/font-awesome.css')!!}
{!!Html::style('css/AdminLTE.css')!!}
{!!Html::style('css/_all-skins.css')!!}
{!!Html::style('css/alertify.css')!!}
{!!Html::style('css/default.css')!!}



<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<H1>ACTUALIZAR DE ADMINISTRADOR</H1>    
	{!!Form::model($administrador,['route'=>['administrador.update',$administrador->id],'method'=>'PUT', 'enctype'=>'multipart/form-data','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;'])!!}
		
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
		@include('alerts.request')
		@include('alerts.success')
		@include('alerts.errors')	    	
	 	<div class="form-group">
	        {!!Form::label('nombre','Nombre:')!!}
	        {!!Form::text('nombre',null,['class'=>'form-control ','placeholder'=>'Ingrese el nombre','maxlength'=>'20'])!!}
	    </div>
	    <div class="form-group">
	        {!!Form::label('apellido','Apellidos:')!!}
	        {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese los apellidos','maxlength'=>'50'])!!}
	    </div>

	    <div class="form-group">
	        {!!Form::label('usuario','Usario:')!!}
	        {!!Form::text('usuario',null,['class'=>'form-control','maxlength'=>'15','placeholder'=>'Ingrese su usuario'])!!}
	        <input type="hidden" name="usuario_aux" value="{{$administrador->usuario}}">
	    </div>	    
    </div>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">		
		<div align="right">
			{!!Form::submit('ACTUALIZAR',['class'=>'btn btn-primary','id'=>'btn_actualizar','onclick'=>'btn_esconder()'])!!}		
			<a href="{!!URL::to('administrador')!!}" class="btn btn-danger">CANCELAR</a>
		</div>		
	{!!Form::close()!!}
    </div>
</div>

{!!Html::script('js/herramientas.js')!!}
{!!Html::script('js/bootstrap.js')!!}
{!!Html::script('js/alertify.js')!!}
{!!Html::script('js/app.js')!!}