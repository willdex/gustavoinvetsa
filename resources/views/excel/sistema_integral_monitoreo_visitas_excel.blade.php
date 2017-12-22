<?php 
header("Pragma: public");
header("Expires: 0");
$filename = $titulo[0]->titulo.".xls";
header("Content-type: application/vnd.ms-excel");//x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>

<?php 
  $aux=0;
  $cont=0;
  $subTotal=0;  
  $Total=0;  
  $empresa="";  
?>

<!DOCTYPE html>
<html>
<head>
	<title>REPORTE INVETSA</title>
</head>
<body>

	<h2>VISITAS A LAS EMPRESAS</h2>


			
	<?php if ($titulo[0]->emp == 0): ?>
		<font size="3">EMPRESA: <b>{{$titulo[0]->empresa}}</b></font>
	<?php else: ?>
		@foreach($datos as $dat)
			<font size="3">EMPRESA: <b>{{$dat->empresa}}</b></font>					
			<?php  break; ?>					
		@endforeach								
	<?php endif ?>
<br>		
		<font size="3">FECHA: <b>DEL {{$titulo[0]->fecha_inicio}} HASTA {{$titulo[0]->fecha_fin}}</b></font>	
<br><br>

	<table border="1">
		<thead>
			<tr style="background: #00993b;color:white">
				<th>EMPRESA</th>
				<th>GRANJA</th>
				<th>VISITAS</th>
			</tr>
		</thead>
		<tbody>
		@foreach($datos as $dat)

<?php 
if ($cont == 0) {
 	$aux=$dat->idEmpresa;
 	$cont=1;
 } 
?>

<?php if ($aux == $dat->idEmpresa): ?>
	<tr align="center"> <td>{{$dat->empresa}}</td><td>{{$dat->granja}}</td><td>{{$dat->visitas}}</td></tr>	
	<?php 
	$subTotal=$subTotal+$dat->visitas;
	$Total=$Total+$dat->visitas;
    $empresa=$dat->empresa;                                                            	
	?>
<?php else: ?>
	<tr align="center" style='background:#E0F8F7;font-size: 16px;font-weight:bold;'> <td>{{$empresa}}</td><td>SUB TOTAL</td><td>{{$subTotal}}</td></tr>	
	<tr align="center"> <td>{{$dat->empresa}}</td><td>{{$dat->granja}}</td><td>{{$dat->visitas}}</td></tr>	
	<?php  
	$subTotal=$dat->visitas;
	$Total=$Total+$dat->visitas;
    $aux=$dat->idEmpresa; 
	?>
<?php endif ?>

	@endforeach	
	<?php if ($titulo[0]->emp == 0): ?>
		<tr align="center" style='background:#E0F8F7;font-size: 16px;font-weight:bold;'> <td>{{$empresa}}</td><td>SUB TOTAL</td><td>{{$subTotal}}</td></tr>				
	<?php endif ?>
	<tr align="center" style='background:#A9E2F3;font-size: 18px;color: red;font-weight:bold;'> <td>TOTAL VISITAS</td><td> --- </td><td>{{$Total}}</td></tr>				

		</tbody>
	</table>	
</body>
</html>


