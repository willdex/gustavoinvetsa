$(document).ready(function(){
    $('#mostrar').hide();
    $('#loading').css("display","none");    
});

$("#id_galpon").change(function(event){
    $('#loading').css("display","block");    
    var idGalpon = $("#id_galpon").val();    
    if (idGalpon == "") {
        $("#body_galpon").show();
        $("#div_render").show();        
        $("#mostrar").hide(); 
        $('#body_galpon_2').empty();                                     
        $('#loading').css("display","none");    
    } else {
        var tabladatos=$("#body_galpon_2");
        $("#div_render").hide();        
        $("#mostrar").show();
        $("#body_galpon").hide();
        $.get("../BuscarGalpon/"+idGalpon, function (res) {
          $('#body_galpon_2').empty();                   
          $(res).each(function (key, value) {        
            tabladatos.append("<tr align=center ><td>"+value.codigo+"</td><td>"+value.cantidad_pollo+"</td>\n\
                <td><a class='btn btn-primary' href='../galpon/"+value.id+"/edit'><i class='fa fa-pencil' aria-hidden='true'></i></a></tr>");              
          });
          $('#loading').css("display","none");              
        });
    }
});

function ver_todos(){
    $('#loading').css("display","block");    
    $("#body_galpon").show();
    $("#div_render").show();        
    $("#mostrar").hide(); 
    $('#body_galpon_2').empty();      
    $('#loading').css("display","none");    
}