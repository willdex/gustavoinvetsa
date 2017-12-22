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
	

	<h2>SISTEMA INTEGRAL DE MONITOREO POR EMPRESA</h2>

			
	<?php if ($titulo[0]->emp == 0): ?>
		<font size="3">EMPRESA: <b>{{$titulo[0]->empresa}}</b></font>
	<?php else: ?>
		@foreach($datos as $dat)
			<font size="3">EMPRESA: <b>{{$dat->empresa}}</b></font>					
			<?php  break; ?>					
		@endforeach	
<br>
		<?php if ($titulo[0]->gra == 0): ?>
			<font size="3">GRANJA: <b>{{$titulo[0]->granja}}</b></font>						
		<?php else: ?>
			@foreach($datos as $dat)
				<font size="3">GRANJA: <b>{{$dat->granja}}</b></font>															
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


