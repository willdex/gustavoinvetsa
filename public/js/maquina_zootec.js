$(document).ready(function(){
    $('#btn_pdf').hide();    
    $('#loading').css("display","none");      
});


function Buscar(){
  $('#loading').css("display","block");   
  var id_tec=$('#id_tecnico').val();
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_monitoreo').empty();                   
      $('#btn_pdf').hide();                 
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_monitoreo').empty();                   
          $('#btn_pdf').hide();            
          $('#loading').css("display","none");   
        }else{
          if (id_tec == "") {
            alertify.alert("ERROR",'NO SELECCIONO UN TECNICO');
            $('#body_monitoreo').empty();                   
            $('#btn_pdf').hide();                  
            $('#loading').css("display","none");   
          } else {
            var tabladatos=$("#body_monitoreo");                 
            var route = "maquina_zootec_busqueda/"+fecha_inicio+"/"+fecha_fin+"/"+id_tec;
            $.get(route, function (res) {
              $('#body_monitoreo').empty();                   
              $(res).each(function (key, value) {    
              tabladatos.append("<tr align=center ><td>"+value.usuario+"</td><td>"+value.telefono+"</td><td>"+value.nombre+"</td><td>"+value.telefono_empresa+"</td><td>"+value.fecha_pedido+"</td></tr>");                                            
            });
            $('#btn_pdf').show();                  
            $('#loading').css("display","none");   
            });             
          }
        }      
    }
}
