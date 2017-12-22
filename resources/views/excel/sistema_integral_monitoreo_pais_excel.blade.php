<?php 
header("Pragma: public");
header("Expires: 0");
$filename = $titulo[0]->titulo.".xls";
header("Content-type: application/vnd.ms-excel");//x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<!DOCTYPE html>
<html>
<head>
	<title>REPORTE INVETSA</title>
</head>
<body>
	

	<h2>SISTEMA INTEGRAL DE MONITOREO POR PAIS</h2>

			
	<?php if ($titulo[0]->pa == 0): ?>
		<font size="3">PAIS: <b>{{$titulo[0]->pais}}</b></font>
	<?php else: ?>
		@foreach($datos as $dat)
			<font size="3">PAIS: <b>{{$dat->pais}}</b></font>					
			<?php  break; ?>					
		@endforeach	
<br>
		<?php if ($titulo[0]->ciu == 0): ?>
			<font size="3">CIUDAD: <b>{{$titulo[0]->ciudad}}</b></font>						
		<?php else: ?>
			@foreach($datos as $dat)
				<font size="3">CIUDAD: <b>{{$dat->ciudad}}</b></font>															
				<?php  break; ?>					
			@endforeach						
		<?php endif ?>
	<?php endif ?>
<br>		
		<?php if ($titulo[0]->dia1 == 0 && $titulo[0]->dia2 == 0): ?>
			<font size="3">DIAS: <b>TODAS LAS EDADES</b></font>											
		<?php else: ?>
			<font size="3">DIAS: <b>{{$titulo[0]->dia1}} - {{$titulo[0]->dia2}}</b></font>											
		<?php endif ?>
<br>		
		<font size="3">FECHA: <b>DEL {{$titulo[0]->fecha_inicio}} HASTA {{$titulo[0]->fecha_fin}}</b></font>	
<br><br>

	<table border="1">
		<thead>
			<tr style="background: #00993b;color:white">
				<!--th>PAIS</th-->
				<th>CIUDAD</th>
				<th>EMPRESA</th>
				<th>GRANJA</th>
				<th>FECHA</th>
				<th>EDAD</th>
				<th>INDICE BURSAL</th>
				<th>INDICE TIMICO</th>
				<th>INDICE HEPATICO</th>
			</tr>
		</thead>
		<tbody>
		@foreach($datos as $dat)
		<tr align="center">
			<!--td>{{$dat->pais}}</td-->
			<td>{{$dat->ciudad}}</td>
			<td>{{$dat->empresa}}</td>
			<td>{{$dat->granja}}</td>
			<td>{{$dat->fecha}}</td>
			<td>{{$dat->edad}}</td>
			<td>{{$dat->indice_bursal}}</td>
			<td>{{$dat->indice_timico}}</td>
			<td>{{$dat->indice_hepatico}}</td>
		</tr>
		@endforeach	
		</tbody>
	</table>
</body>
</html>


