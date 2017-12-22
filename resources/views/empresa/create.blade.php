@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.cargando')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<H3 style="color:red"><b>REGISTRO DE EMPRESA</b></H3>    
			@include('alerts.request')
			{!!Form::open(['route'=>'empresa.store', 'method'=>'POST','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;'])!!}
		    <div class="form-group">
		        {!!Form::label('nombre','Nombre:')!!}
		        {!!Form::text('nombre',null,['class'=>'form-control ','placeholder'=>'Nombre'])!!}
		    </div>		   
		    <div class="form-group">
		        {!!Form::label('direccion','Direccion:')!!}
		        {!!Form::text('direccion',null,['class'=>'form-control ','placeholder'=>'Direccion'])!!}
		    </div>
		    <div class="form-group">
		        {!!Form::label('id_ciudad','Ciudad:')!!}
		        {!!Form::select('id_ciudad',$ciudad,null,['class'=>'form-control','placeholder'=>'Seleccione Una Ciudad'])!!}
		    </div>		    		     
		</div>
	</div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">		
		<div align="right">
			{!!Form::submit('REGISTRAR',['class'=>'btn btn-primary','id'=>'btn_registrar','onclick'=>'btn_esconder()'])!!}		
			<a href="{!!URL::to('empresa')!!}" class="btn btn-danger">CANCELAR</a>
		</div>		
		{!!Form::close()!!}
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#loading').css("display","none");
});
	
</script>
@endsection