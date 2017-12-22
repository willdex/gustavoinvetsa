<!DOCTYPE html>
<html>
<head>
	<title>Zootec</title>
</head>
<body>
	<table width="100%">
		<tr align="center">
			<td align="left"><font size="4"><b>Informe de Servicio de Mantenimiento - Zootec</b></font></td>
			<td><font size="2"></font><b>{{$zootec[0]->fecha}}</b></td>
			<td><font size="2">Codigo</font> <font size="2"><b>{{$zootec[0]->codigo}}</b></font></td>
			<td><font size="2">Revision</font> <font size="2"><b>{{$zootec[0]->revision}}</b></font></td>
		</tr>
		<tr align="left">
			<td><font size="3">Compañia:</font> <font size="3"><b>{{$zootec[0]->compania}}</b></font></td>
			<td colspan="2"><font size="3">Hora de Ingreso:</font> <font size="3"><b>{{$zootec[0]->hora_ingreso}}</b></font></td>
		</tr>
		<tr align="left">
			<td><font size="3">Planta de Incubación:</font> <font size="3"><b>{{$zootec[0]->planta_de_incubacion}}</b></font></td>
			<td colspan="2"><font size="3">Hora de Salida:</font> <font size="3"><b>{{$zootec[0]->hora_salidas}}</b></font></td>
		</tr>		
		<tr align="left">
			<td><font size="3">Dirección:</font> <font size="3"><b>{{$zootec[0]->direccion_compania}}</b></font></td>
			<td colspan="2"><font size="3">Codigo Máquina:</font> <font size="3"><b>{{$zootec[0]->codigo_maquina}}</b></font></td>
		</tr>	
		<tr align="left">
			<td><font size="3">Jefe de Planta:</font> <font size="3"><b>{{$zootec[0]->jefe_planta}}</b></font></td>
			<td colspan="2"><font size="3">Ultima Visita:</font> <font size="3"><b>{{$zootec[0]->ultima_visita}}</b></font></td>
		</tr>		
		<tr align="left">
			<td colspan="5"><font size="3">Encargados de Máquinas:</font> <font size="3"><b>{{$zootec[0]->encargado_maquina}}</b></font></td>
		</tr>						
	</table><br>
	<!---->
	<?php $cont=1; ?>
	<table width="100%">
		<tr style="background:#0B6121;color: white">
			<td colspan="4">1.- INSPECCION VISUAL</td>
		</tr>	
		<tr align="center" style="background:#04B431;color: white; font-size: 13px">
			<td>CODIGO PROVEEDOR</td>
			<td>DESCRIPCION</td>
			<td>BUENO</td>
			<td>MALO</td>					
		</tr>
		<tr style="background:#E0F8F1;color: #0B6121; font-size: 13px" align="center">
			<td colspan="4">ESTRUCTURA</td>
		</tr>			
	@foreach($det_insp_visual as $div)
		<tr style="background:#FAFAFA; font-size: 12px">
			<td align="center">{{$div->codigo}}</td>
			<td>{{$div->descripcion}}</td>
			<?php if ($div->bueno == 1) {
				echo "<td align='center'> <input type='radio' checked='true'> </td>";							
			}else{
				echo "<td align='center'> <input type='radio'> </td>";										
			} ?>
			<?php if ($div->malo == 1) {
				echo "<td align='center'> <input type='radio' checked='true'> </td>";							
			}else{
				echo "<td align='center'> <input type='radio'> </td>";										
			} ?>				
		</tr>
	<?php $cont++;
		switch ($cont) {
		case 7:
			echo "<tr style='background:#E0F8F1;color: #0B6121; font-size:13px' align='center'> <td colspan=4>PLATO DE COLOCACION</td> </tr>";			
			break;
		case 22:
			echo "<tr style='background:#E0F8F1;color: #0B6121; font-size:13px' align='center'> <td colspan=4>JERINGAS / TUBERIAS</td> </tr>";			
			break;	
		case 28:
			echo "<tr style='background:#E0F8F1;color: #0B6121; font-size:13px' align='center'> <td colspan=4>KIT INYECCION</td> </tr>";			
			break;					
		case 30:
			echo "<tr style='background:#E0F8F1;color: #0B6121; font-size:13px' align='center'> <td colspan=4>NEUMATICA</td> </tr>";			
			break;	
		case 43:
			echo "<tr style='background:#E0F8F1;color: #0B6121; font-size:13px' align='center'> <td colspan=4>NEOMATICA</td> </tr>";			
			break;	
	} ?>		
	@endforeach

	</table><br>
	
<font size="3">Observaciones:</font><br>
<font size="3"><b>{{$insp_visual[0]->observaciones}}</b></font><br><br>
<font size="3">Piezas Cambiadas:</font><br>
<font size="3"><b>{{$insp_visual[0]->piezas_cambiadas}}</b></font><br><br>

<table width="100%">
	<tr style="background:#0B6121;color: white">
		<td colspan="3">2.- INSPECCION DEL FUNCIONAMIENTO</td>
	</tr>
	<tr align="center" style="background:#04B431;color: white;font-size: 13px">
		<td>CRITERIOS DE EVALUACION</td>
		<td>BUENO</td>
		<td>MALO</td>
	</tr>	
	@foreach($det_insp_funcional_1 as $dif_1)
	<tr style="background:#FAFAFA; font-size: 12px">
		<td>{{$dif_1->criterio_evaluacion}}</td>
			<?php if ($dif_1->bueno == 1) {
				echo "<td align='center'> <input type='radio' checked='true'> </td>";							
			}else{
				echo "<td align='center'> <input type='radio'> </td>";										
			} ?>
			<?php if ($dif_1->malo == 1) {
				echo "<td align='center'> <input type='radio' checked='true'> </td>";							
			}else{
				echo "<td align='center'> <input type='radio'> </td>";										
			} ?>	
	</tr>
	@endforeach

</table><br>
<font size="3">Observaciones:</font><br>
<font size="3"><b>{{$inspeccion_funcionamiento[0]->observaciones}}</b></font><br><br>
<font size="3">Frecuencia de Uso:</font><br>
<font size="3"><b>{{$inspeccion_funcionamiento[0]->frecuencia_de_uso}}</b></font><br><br>


<!---->
<table width="100%">
	<tr style="background:#0B6121;color: white">
		<td colspan="3">3.- LIMPIEZA Y DESINFECCION</td>
	</tr>
	<tr align="center" style="background:#04B431;color: white;font-size: 13px">
		<td>CRITERIOS DE EVALUACION</td>
		<td>BUENO</td>
		<td>MALO</td>
	</tr>	
	@foreach($det_insp_funcional_2 as $dif_2)
	<tr style="background:#FAFAFA; font-size: 12px">
		<td>{{$dif_2->criterio_evaluacion}}</td>
			<?php if ($dif_2->bueno == 1) {
				echo "<td align='center'> <input type='radio' checked='true'> </td>";							
			}else{
				echo "<td align='center'> <input type='radio'> </td>";										
			} ?>
			<?php if ($dif_2->malo == 1) {
				echo "<td align='center'> <input type='radio' checked='true'> </td>";							
			}else{
				echo "<td align='center'> <input type='radio'> </td>";										
			} ?>	
	</tr>
	@endforeach
</table><br>
<font size="3">Observaciones:</font><br>
<font size="3"><b>{{$inspeccion_funcionamiento[1]->observaciones}}</b></font><br><br>
<font size="3">Cantidad de Aves Vacunadas / Dia:</font><br>
<font size="3"><b>{{$inspeccion_funcionamiento[1]->frecuencia_de_uso}}</b></font><br><br>


<table align="center">
	<tr align="center">
		<td colspan="2">
			<font size="3">Imagen Del Responsable:</font><br>
			<img src="{{asset('images/imagen.png')}}" width="250" height="200"><br><br>
		</td>
	</tr>
	<tr align="center">
		<td>
			<font size="3">Firma Jefe De Planta De Incubación:</font><br>
			<img src="{{asset('images/imagen.png')}}" width="250" height="200">
		</td>
		<td>
			<font size="3">Firma Invetsa:</font><br>
			<img src="{{asset('images/imagen.png')}}" width="250" height="200">
		</td>
	</tr>

</table>


</body>
</html>