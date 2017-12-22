$(document).ready(function(){
    $('#div_granja').hide();
    //$('#div_ciudad').hide();
    $('#btn_excel').hide();    
    $('#loading').css("display","none");    
});



$("#id_empresa").change(function(event){
    $('#loading').css("display","block");    
    var idEmpresa = $("#id_empresa").val();   
    if (idEmpresa == 0) {
        $('#body_monitoreo').empty();                   
        $("#div_granja").hide(); 
        $('#btn_excel').hide();    
        $('#loading').css("display","none");              
    } else {
        var tabladatos=$("#body_monitoreo");
        $('#body_monitoreo').empty();                   
        $('#btn_excel').hide();    
        $("#div_granja").show();
        $.get("BuscarGranja/"+idEmpresa, function (res) {
          $('select[name=id_granja]').empty();
          $('select[name=id_granja]').append('<option value="0"> Todas Las Granjas');
          $(res).each(function (key, value) {  
            $('select[name=id_granja]').append('<option value="'+value.id+'">'+value.nombre);
          });
          $('#loading').css("display","none");                       
        });
    }
});


$("#id_granja").change(function(event){
    $('#body_monitoreo').empty();                   
    $('#btn_excel').hide();    
});

$("#id_dia").change(function(event){
    $('#body_monitoreo').empty();                   
    $('#btn_excel').hide();    
});

function Sistema_Integral_Monitoreo(){
  $('#loading').css("display","block");   
  var id_empresa=$('#id_empresa').val();
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_monitoreo').empty();                   
      $('#btn_excel').hide();                 
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_monitoreo').empty();                   
          $('#btn_excel').hide();            
          $('#loading').css("display","none");   
        }else{
          dia1=$("#dia_1").val();
          dia2=$("#dia_2").val();            
          if (parseInt(dia1) <= parseInt(dia2)) {
            /*switch($('#id_dia').val()) { //esto era cuando usaba el commbobox
              case '0':
                dia1=0; dia2=0;
                break;            
              case '1':
                dia1=21; dia2=22;
                break;
              case '2':
                dia1=24; dia2=25;
                break;
              case '3':
                dia1=28; dia2=29;
                break;
              case '4':
                dia1=35; dia2=36;
                break;                
            }*/
            switch($('#id_empresa').val()) {
              case '0':
                var route = "SistemaIntegralMonitoreo/"+id_empresa+"/0/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2;                              
                break;
              default:
                var id_granja=$("#id_granja").val();
                var route = "SistemaIntegralMonitoreo/"+id_empresa+"/"+id_granja+"/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2;                  
            }   
            $('#loading').css("display","none");   
            var tabladatos=$("#body_monitoreo");                 
            $.get(route, function (res) {
              $('#body_monitoreo').empty();                   
              $(res).each(function (key, value) {    
                tabladatos.append("<tr align=center ><td>"+value.empresa+"</td><td>"+value.granja+"</td><td>"+value.fecha+"</td><td>"+value.edad+"</td><td>"+value.indice_bursal+"</td><td>"+value.indice_timico+"</td><td>"+value.indice_hepatico+"</td></tr>");                                            
                $('#btn_excel').show();                  
              });
            $('#loading').css("display","none");   
            }); 
          }else{
            alertify.alert("ERROR",'EL DIA 1 TIENE QUE SER MENOR QUE EL DIA 2');
            $('#body_monitoreo').empty();                   
            $('#btn_excel').hide();            
            $('#loading').css("display","none");             
          }
        }      
    }
}


function Sistema_Integral_Monitoreo_Excel(){
  $('#loading').css("display","block");   
  var id_empresa=$('#id_empresa').val();
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_monitoreo').empty();                   
      $('#btn_excel').hide();                 
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_monitoreo').empty();                   
          $('#btn_excel').hide();            
          $('#loading').css("display","none");   
        }else{
          dia1=$("#dia_1").val();
          dia2=$("#dia_2").val();            
          if (parseInt(dia1) <= parseInt(dia2)) {
            /*switch($('#id_dia').val()) {
              case '0':
                dia1=0; dia2=0;
                break;            
              case '1':
                dia1=21; dia2=22;
                break;
              case '2':
                dia1=24; dia2=25;
                break;
              case '3':
                dia1=28; dia2=29;
                break;
              case '4':
                dia1=35; dia2=36;
                break;                
            }    */
            switch($('#id_empresa').val()) {
              case '0':                
                window.open("SistemaIntegralMonitoreoExcel/"+id_empresa+"/0/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2);     
                break;
              default:
                var id_granja=$("#id_granja").val();
                window.open("SistemaIntegralMonitoreoExcel/"+id_empresa+"/"+id_granja+"/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2);               
            }   
            $('#loading').css("display","none");    
          }else{
            alertify.alert("ERROR",'EL DIA 1 TIENE QUE SER MENOR QUE EL DIA 2');
            $('#body_monitoreo').empty();                   
            $('#btn_excel').hide();            
            $('#loading').css("display","none");             
          }
          
        }      
    }
}



//////////////////////////////////
////////////POR PAIS//////////////
//////////////////////////////////


$("#id_pais").change(function(event){
    $('#loading').css("display","block");    
    var idPais = $("#id_pais").val();   
    if (idPais == 0) {
        $('#body_monitoreo').empty();                   
        $("#div_ciudad").hide(); 
        $('#btn_excel').hide();    
        $('#loading').css("display","none");              
    } else {
        var tabladatos=$("#body_monitoreo");
        $('#body_monitoreo').empty();                   
        $('#btn_excel').hide();    
        $("#div_ciudad").show();
        $.get("BuscarCiudad/"+idPais, function (res) {
          $('select[name=id_ciudad]').empty();
          $('select[name=id_ciudad]').append('<option value="0"> Todas Las Ciudades');
          $(res).each(function (key, value) {  
            $('select[name=id_ciudad]').append('<option value="'+value.id+'">'+value.nombre);
          });
          $('#loading').css("display","none");                       
        });
    }
});


$("#id_ciudad").change(function(event){
    $('#body_monitoreo').empty();                   
    $('#btn_excel').hide();    
});

function Sistema_Integral_Monitoreo_Pais(){
  $('#loading').css("display","block");   
  var id_pais=$('#id_pais').val();
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_monitoreo').empty();                   
      $('#btn_excel').hide();                 
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_monitoreo').empty();                   
          $('#btn_excel').hide();            
          $('#loading').css("display","none");   
        }else{
          dia1=$("#dia_1").val();
          dia2=$("#dia_2").val();            
          if (parseInt(dia1) <= parseInt(dia2)) {
            /*switch($('#id_dia').val()) {
              case '0':
                dia1=0; dia2=0;
                break;            
              case '1':
                dia1=21; dia2=22;
                break;
              case '2':
                dia1=24; dia2=25;
                break;
              case '3':
                dia1=28; dia2=29;
                break;
              case '4':
                dia1=35; dia2=36;
                break;                
            }    */

            switch($('#id_pais').val()) {
              case '0':
                var route = "SistemaIntegralMonitoreoPais/"+id_pais+"/0/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2;                              
                break;
              default:
                var id_ciudad=$("#id_ciudad").val();
                var route = "SistemaIntegralMonitoreoPais/"+id_pais+"/"+id_ciudad+"/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2;                  
            }   

            $('#loading').css("display","none");   
            var tabladatos=$("#body_monitoreo");                 
            $.get(route, function (res) {
              $('#body_monitoreo').empty();                   
              $(res).each(function (key, value) {    
                tabladatos.append("<tr align=center><td>"+value.ciudad+"</td><td>"+value.empresa+"</td><td>"+value.granja+"</td><td>"+value.fecha+"</td><td>"+value.edad+"</td><td>"+value.indice_bursal+"</td><td>"+value.indice_timico+"</td><td>"+value.indice_hepatico+"</td></tr>");                                            
                $('#btn_excel').show();                  
              });
            $('#loading').css("display","none");   
            });            

          }else{
            alertify.alert("ERROR",'EL DIA 1 TIENE QUE SER MENOR QUE EL DIA 2');
            $('#body_monitoreo').empty();                   
            $('#btn_excel').hide();            
            $('#loading').css("display","none");             
          }
          
        }      
    }
}


function Sistema_Integral_Monitoreo_Pais_Excel(){
  $('#loading').css("display","block");   
  var id_pais=$('#id_pais').val();
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_monitoreo').empty();                   
      $('#btn_excel').hide();                 
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_monitoreo').empty();                   
          $('#btn_excel').hide();            
          $('#loading').css("display","none");   
        }else{
          dia1=$("#dia_1").val();
          dia2=$("#dia_2").val();            
          if (parseInt(dia1) <= parseInt(dia2)) {
            /*switch($('#id_dia').val()) {
              case '0':
                dia1=0; dia2=0;
                break;
              case '1':
                dia1=21; dia2=22;
                break;
              case '2':
                dia1=24; dia2=25;
                break;
              case '3':
                dia1=28; dia2=29;
                break;
              case '4':
                dia1=35; dia2=36;
                break;                
            }    */

            switch($('#id_pais').val()) {
              case '0':                
                window.open("SistemaIntegralMonitoreoPaisExcel/"+id_pais+"/0/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2);     
                break;
              default:
                var id_ciudad=$("#id_ciudad").val();
                window.open("SistemaIntegralMonitoreoPaisExcel/"+id_pais+"/"+id_ciudad+"/"+fecha_inicio+"/"+fecha_fin+"/"+dia1+"/"+dia2);               
            }   
            $('#loading').css("display","none");          
          }else{
            alertify.alert("ERROR",'EL DIA 1 TIENE QUE SER MENOR QUE EL DIA 2');
            $('#body_monitoreo').empty();                   
            $('#btn_excel').hide();            
            $('#loading').css("display","none");             
          }          
        }      
    }
}



////////////////////////////////////////////
////////////VISITAS A EMPRESAS//////////////
///////////////////////////////////////////

$("#id_empresa_visita").change(function(event){
  $('#loading').css("display","block");    
  $('#body_monitoreo').empty();                   
  $('#body_monitoreo_foot').empty();                   
  $('#btn_excel').hide();    
  $('#loading').css("display","none");  
  var aux=0;
  var cont=0;
  var subTotal=0;      
  var Total=0;      
  var empresa="";                                                            
});

function Sistema_Integral_Monitoreo_Visitas(){
  var aux=0;
  var cont=0;
  var subTotal=0;  
  var Total=0;  
  var empresa="";                                                            
  $('#loading').css("display","block");   
  var id_empresa=$('#id_empresa_visita').val();
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_monitoreo').empty();                   
      $('#body_monitoreo_foot').empty();                   
      $('#btn_excel').hide();                 
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_monitoreo').empty();                   
          $('#body_monitoreo_foot').empty();                   
          $('#btn_excel').hide();            
          $('#loading').css("display","none");   
        }else{
          $('#btn_buscar').hide();                 
          switch($('#id_empresa_visita').val()) {
            case '0':
              var route = "SistemaIntegralMonitoreoVisitas/0/"+fecha_inicio+"/"+fecha_fin;                            
              break;
            default:
              var route = "SistemaIntegralMonitoreoVisitas/"+id_empresa+"/"+fecha_inicio+"/"+fecha_fin;                 
          }   

          $('#loading').css("display","none");   
          var tabladatos=$("#body_monitoreo");                 
          var tabladatosfoot=$("#body_monitoreo_foot");                 
          $.get(route, function (res) {
            $('#body_monitoreo').empty();                   
            $('#body_monitoreo_foot').empty();                   
            $(res).each(function (key, value) {
              if (cont==0) {
                aux=value.idEmpresa;  
                cont=1;             
              } 

              if (aux == value.idEmpresa) {
                tabladatos.append("<tr align=center><td>"+value.empresa+"</td><td>"+value.granja+"</td><td>"+value.visitas+"</td></tr>");
                subTotal=parseInt(subTotal)+parseInt(value.visitas);
                Total=parseInt(Total)+parseInt(value.visitas);
                empresa=value.empresa;                                                            
              } else {
                tabladatos.append("<tr align=center style='background:#E0F8F7;font-size: 16px;'><td><b>"+empresa+"</b></td><td><b>SUB TOTAL</b></td><td><b>"+subTotal+"</b></td></tr>");  
                tabladatos.append("<tr align=center><td>"+value.empresa+"</td><td>"+value.granja+"</td><td>"+value.visitas+"</td></tr>"); 
                subTotal=value.visitas;
                Total=parseInt(Total)+parseInt(value.visitas);
                aux=value.idEmpresa;                            
              } 
              $('#btn_excel').show();                  
            });

          
          if (id_empresa==0) {
            tabladatos.append("<tr align=center style='background:#E0F8F7;font-size: 16px;'><td><b>"+empresa+"</b></td><td><b>SUB TOTAL</b></td><td><b>"+subTotal+"</b></td></tr>");
          }
          tabladatosfoot.append("<tr align=center style='background:#A9E2F3;font-size: 18px;color: red;font-weight:bold;'><td>TOTAL VISITAS</td><td><b>---</b></td><td>"+Total+"</td></tr>");
          $('#loading').css("display","none");   
          });            
          $('#btn_buscar').show();                           
        }      
    }
}



function Sistema_Integral_Monitoreo_Visitas_Excel(){
  $('#loading').css("display","block");   
  var id_empresa=$('#id_empresa_visita').val();
  var fecha_inicio = $("#fecha_inicio").val();
  var fecha_fin = $("#fecha_fin").val();
  if (fecha_inicio == "" || fecha_fin == "") {
      alertify.alert("ERROR",'INTRODUSCA LAS 2 FECHAS');
      $('#body_monitoreo').empty();                   
      $('#btn_excel').hide();                 
      $('#loading').css("display","none");   
    } else{
        var primera = Date.parse(fecha_inicio); 
        var segunda = Date.parse(fecha_fin); 
        if (primera > segunda) {         
          alertify.alert("ERROR",'LA FECHA INICIO TIENE QUE SER MAYOR QUE LA FECHA FIN');
          $('#body_monitoreo').empty();                   
          $('#btn_excel').hide();            
          $('#loading').css("display","none");   
        }else{

          switch($('#id_empresa_visita').val()) {
            case '0':                
              window.open("SistemaIntegralMonitoreoVisitasExcel/0/"+fecha_inicio+"/"+fecha_fin);     
              break;
            default:              
              window.open("SistemaIntegralMonitoreoVisitasExcel/"+id_empresa+"/"+fecha_inicio+"/"+fecha_fin);               
          }   

          $('#loading').css("display","none");          
          
        }      
    }
}