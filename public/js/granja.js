$(document).ready(function(){
    $('#mostrar').hide();
    $('#loading').css("display","none");    
});

$("#id_granja").change(function(event){
    $('#loading').css("display","block");    
    var idGranja = $("#id_granja").val();    
    if (idGranja == "") {
        $("#body_granja").show();
        $("#div_render").show();        
        $("#mostrar").hide(); 
        $('#body_granja_2').empty();                                     
        $('#loading').css("display","none");    
    } else {
        var tabladatos=$("#body_granja_2");
        $("#div_render").hide();        
        $("#mostrar").show();
        $("#body_granja").hide();
        $.get("../BuscarGranjas/"+idGranja, function (res) {
          $('#body_granja_2').empty();                   
          $(res).each(function (key, value) {        
            tabladatos.append("<tr align=center ><td>"+value.nombre+"</td><td>"+value.zona+"</td>\n\
                <td><a class='btn btn-primary' href='../granja/"+value.id+"/edit'><i class='fa fa-pencil' aria-hidden='true'></i></a>\n\
                <a class='btn btn-warning' href='../granja/"+value.id+"'><i class='fa fa-home' aria-hidden='true'></i></a></td></tr>");              
          });
          $('#loading').css("display","none");              
        });
    }
});

function ver_todos(){
    $('#loading').css("display","block");    
    $("#body_granja").show();
    $("#div_render").show();        
    $("#mostrar").hide(); 
    $('#body_granja_2').empty();      
    $('#loading').css("display","none");    
}