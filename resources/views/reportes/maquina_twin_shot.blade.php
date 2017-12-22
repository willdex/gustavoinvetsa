@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')

	<div class="row">	
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
             <font size="4" color="red">Mantenimiento Máquina Twin Shot</font>          
        </div>

		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		    <select name="id_tecnico" class="form-control selectpicker" id="id_tecnico" data-live-search="true" >
		     <option value="">BUSCAR TECNICO... </option>
		        @foreach($buscar_tecnico as $user)
		        <option value="{{$user->id}}">{{$user->nombre}} - {{$user->codigo}}</option>
		        @endforeach
		    </select>
		</div>

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" align="right">
            <b>Fecha Inicio:</b>         
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class='input-group date' id='datetimepicker10'>
              <input type='text' class="form-control" id="fecha_inicio" name="fecha_inicio" style="font-size:15px;text-align:left" />
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
              <input type='text' class="form-control" id="fecha_fin" name="fecha_fin" style="font-size:15px;text-align:left" />
              <span class="input-group-addon ">
                 <span class="fa fa-calendar" aria-hidden="true"></span> 
              </span>
            </div>
        </div>


        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" align="left">
            <button class="btn-sm btn-info" title="BUSCAR" onclick="Buscar()"><i class="fa fa-search"></i></button> 
            <button class="btn-sm btn-success" title="PDF"><i class="fa fa-file-text" aria-hidden="true"></i></button> 
        </div>                                      

	</div>



	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive" style="overflow-x:inherit">	
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th><center>DATOS</center></th>
					<th><center>DATOS</center></th>
					<th><center>DATOS</center></th>
					<th><center>DATOS</center></th>
					<th><center>DATOS</center></th>
					<th><center>DATOS</center></th>
				</thead>

				<tbody align="center" id="body_monitoreo"> </tbody>
			</table>
		</div>
	</div>
</div>
{!!Html::script('js/mauqina_twin_shot.js')!!}
@endsection
