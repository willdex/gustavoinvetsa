$(document).ready(function(){
    $('#mostrar').hide();
    $('#loading').css("display","none");    
});


function Buscar_SIM(){
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
            var route = "Buscar_SIM/"+fecha_inicio+"/"+fecha_fin;
            $.get(route, function (res) {
              $('#body_sim').empty();                   
              $(res).each(function (key, value) {   
			  switch (value.sexo) {
			    case 'F':
			        sexo="Hembra";
			        break;
			    case 'M':
			        sexo="Macho";
			        break;
			    case '0':
			        sexo="Mixto";
			        break;		        		    
			  }               
              tabladatos.append("<tr align=center ><td>"+value.fecha+"</td><td>"+value.tecnico+"</td><td>"+value.empresa+"</td><td>"+value.granja+"</td><td>"+value.galpon+"</td><td>"+value.zona+"</td><td>"+value.edad+"</td><td>"+sexo+"</td><td>"+value.nro_pollos+"</td>\n\
              	<td><a class='btn btn-primary' title='ACTUALIZAR' href='GuardarSIM/"+value.id+"/edit'><i class='fa fa-pencil' aria-hidden='true'></i></a></td></tr>");
            });
            $('#loading').css("display","none");   
            });             
        }      
    }
}

function ver_todos(){
    $('#loading').css("display","block");    
    $("#body_sim").show();          
    $("#mostrar").hide(); 
    $('#body_sim_2').empty();      
    $('#body_sim_2').hide();      
    $('#loading').css("display","none");    
}