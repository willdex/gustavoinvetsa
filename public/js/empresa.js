$(document).ready(function(){
    $('#mostrar').hide();
    $('#loading').css("display","none");    
});

$("#id_empresa").change(function(event){
    $('#loading').css("display","block");    
    var idEmpresa = $("#id_empresa").val();    
    if (idEmpresa == "") {
        $("#body_empresa").show();
        $("#div_render").show();        
        $("#mostrar").hide(); 
        $('#body_empresa_2').empty();                                     
        $('#loading').css("display","none");    
    } else {
        var tabladatos=$("#body_empresa_2");
        $("#div_render").hide();        
        $("#mostrar").show();
        $("#body_empresa").hide();
        $.get("BuscarEmpresa/"+idEmpresa, function (res) {
          $('#body_empresa_2').empty();                   
          $(res).each(function (key, value) {        
            tabladatos.append("<tr align=center ><td>"+value.nombre+"</td><td>"+value.direccion+"</td><td>"+value.ciudad+"</td>\n\
                <td><a class='btn btn-primary' href='empresa/"+value.id+"/edit'><i class='fa fa-pencil' aria-hidden='true'></i></a>\n\
                <a class='btn btn-warning' href='empresa/"+value.id+"'><i class='fa fa-home' aria-hidden='true'></i></a></td></tr>");              
          });
          $('#loading').css("display","none");              
        });
    }
});

function ver_todos(){
    $('#loading').css("display","block");    
    $("#body_empresa").show();
    $("#div_render").show();        
    $("#mostrar").hide(); 
    $('#body_empresa_2').empty();      
    $('#loading').css("display","none");    
}