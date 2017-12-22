@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.cargando')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors') 

<div class="row">	
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default" style="background:#b2b0d8">
          <div class="panel-heading" style="background:#b2b0d8">
                <a href="sistema_integral_monitoreo" class="btn-sm btn-default" style="background: #5c59a0;color:white"><b>EMPRESA</b></a>                
                <a href="sistema_integral_monitoreo_pais" class="btn-sm btn-default" style="background: #5c59a0;color:white"><b>PAIS</b></a>                
                <a href="sistema_integral_monitoreo_visitas" class="btn-sm btn-default" style="background: #5c59a0;color:white"><b>VISITAS</b></a>                
          </div>
        </div>                  
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4 style="color: red"><b>SISTEMA INTEGRAL DE MONITOREO POR EMPRESA</b></h4>                    
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <font size="2"><b>EMPRESA: </b></font><br>
    		    <select name="id_empresa" class="form-control selectpicker" id="id_empresa" data-live-search="true" >
    		     <option value="0">Todas Las Empresas... </option>
    		        @foreach($buscar_empresa as $emp)
    		        <option value="{{$emp->id}}">{{$emp->nombre}}</option>
    		        @endforeach
    		    </select>
    		</div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" id="div_granja">
            <font size="2"><b>GRANJA: </b></font><br>
            <select name="id_granja" class="form-control" id="id_granja">
            </select>
        </div>    

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <font size="2"><b>DIA 1: </b></font><br>            
            <input type="text" name="dia_1" class="form-control" style="text-align: center;font-size: 15pt" id="dia_1" onkeypress="return bloqueo_de_punto(event)" maxlength="2" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'>
            <!--font size="2"><b>DIAS: </b></font><br>
            <select name="id_dia" style="height: 32px;font-size: 16px" id="id_dia">
                <option value="0">Todos</option>
                <option value="1">21 - 22</option>
                <option value="2">24 - 25</option>
                <option value="3">28 - 29</option>
                <option value="4">35 - 36</option>
            </select-->
        </div>    

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <font size="2"><b>DIA 2: </b></font><br>            
            <input type="text" name="dia_2" class="form-control" style="text-align: center;font-size: 15pt" id="dia_2" onkeypress="return bloqueo_de_punto(event)" maxlength="2" value="0" onclick='return limpia(this)' onBlur='return verificar(this)'>
        </div>    


        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <font size="2"><b>FECHA INICIO: </b></font><br>
            <div class='input-group date' id='datetimepicker10'>
              <input type='text' class="form-control" id="fecha_inicio" name="fecha_inicio" style="font-size:17px;text-align:left" />
              <span class="input-group-addon ">
                 <span class="fa fa-calendar" aria-hidden="true"></span> 
              </span>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <font size="2"><b>FECHA FIN: </b></font><br>
            <div class='input-group date' id='datetimepicker11'>
              <input type='text' class="form-control" id="fecha_fin" name="fecha_fin" style="font-size:17px;text-align:left" />
              <span class="input-group-addon ">
                 <span class="fa fa-calendar" aria-hidden="true"></span> 
              </span>
            </div>
        </div>


        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" align="left"><br>
            <button class="btn-sm btn-info" title="BUSCAR" onclick="Sistema_Integral_Monitoreo()"><i class="fa fa-search"></i></button> 
            <button class="btn-sm btn-success" title="EXCEL" id="btn_excel" onclick="Sistema_Integral_Monitoreo_Excel()"><i class="fa fa-file-text" aria-hidden="true"></i></button> 
        </div>                                      

	</div>



	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive" style="overflow-x:inherit">	<br>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th><center>EMPRESA</center></th>
					<th><center>GRANJA</center></th>
                    <th><center>FECHA</center></th>
					<th><center>DIAS</center></th>
					<th><center>INDICE BURSAL</center></th>
					<th><center>INDICE TIMICO</center></th>
					<th><center>INDICE HEPATICO</center></th>
				</thead>

				<tbody align="center" id="body_monitoreo"> </tbody>
			</table>
		</div>
	</div>
</div>
{!!Html::script('js/sistema_integral_monitoreo.js')!!}
@endsection
