$(document).ready(function(){
    $('#loading').css("display","none");    
});


function Buscar_Spravac(){
  $('#loading').css("display","block");   
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_sim').empty();                   
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_sim').empty();                   
          $('#loading').css("display","none");   
        }else{
            var tabladatos=$("#body_sim");                 
            var route = "Buscar_Spravac/"+fecha_inicio+"/"+fecha_fin;
            $.get(route, function (res) {
              $('#body_sim').empty();                   
              $(res).each(function (key, value) {              
              tabladatos.append("<tr align=center ><td>"+value.fecha+"</td><td>"+value.revision+"</td><td>"+value.tecnico+"</td><td>"+value.compania+"</td><td>"+value.direccion_compania+"</td><td>"+value.codigo_maquina+"</td><td>"+value.jefe_planta+"</td>\n\
              	<td><a class='btn btn-success' title='PDF' href='MantenimientoSpravac_PDF/"+value.id+"' target='blank'><i class='fa fa-file' aria-hidden='true'></i></a></td></tr>");
            });
            $('#loading').css("display","none");   
            });             
        }      
    }
}
