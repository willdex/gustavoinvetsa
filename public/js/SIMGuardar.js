$(document).ready(function(){
    $('#mostrar').hide();
    $('#loading').css("display","none");    
});

$("#empresa").change(function(event){
    $('#loading').css("display","block");    
    var idEmpresa = $("#empresa").val();    
    if (idEmpresa == "") {           
	    $('select[name=granja]').empty();    	                        
        $('#loading').css("display","none");    
    } else {
        $.get("../BuscarGranja/"+idEmpresa, function (res) {
	      $('select[name=granja]').empty();          
          $(res).each(function (key, value) {        
	          $('select[name=granja]').empty();
	          //$('select[name=granja]').addClass('selectpicker')
	          //document.getElementById("granja").setAttribute("data-live-search", "true");
	          $('select[name=granja]').append('<option value="0"> Seleccione Una Granja');
	          $(res).each(function (key, value) {  
	            $('select[name=granja]').append('<option value="'+value.id+'">'+value.nombre);           	            
	          });            
          });
          $('#loading').css("display","none");              
        });
    }
});

$("#granja").change(function(event){
    $('#loading').css("display","block");    
    var idGranja = $("#granja").val();  
    if (idGranja == "") {                                    
	    $('select[name=galpon]').empty();    
	  	$("input[name=zona]").val("");              	            	            	       
        $('#loading').css("display","none");    
    } else {
        $.get("../BuscarGalpones/"+idGranja, function (res) {
	      $('select[name=galpon]').empty();        	
          $(res).each(function (key, value) {   
	          $('select[name=galpon]').empty();
	          $('select[name=galpon]').append('<option value="0"> Seleccione Una Galpon');
	          $(res).each(function (key, value) {  
	            $('select[name=galpon]').append('<option value="'+value.id+'">'+value.codigo);
	          });   	              
          });
          $('#loading').css("display","none");              
        });   
	    $.get("../BuscarGranjas/"+idGranja, function (res) {
	      $(res).each(function (key, value) {   
	  	  	$("input[name=zona]").val("");              	            	            
	  	  	$("input[name=zona]").val(value.zona);   	              
	      });
	    });              
    }
});


///CALCULAR PESO CORPORAL
$('input[name=peso_corporal_1]').change(function(event){
	verificar_peso_corporal();
	promedio_peso_corporal = parseFloat($("input[name=peso_corporal_1]").val()) + parseFloat($("input[name=peso_corporal_2]").val()) + parseFloat($("input[name=peso_corporal_3]").val()) + parseFloat($("input[name=peso_corporal_4]").val()) + parseFloat($("input[name=peso_corporal_5]").val());
	$("input[name=peso_corporal_6]").val((parseFloat(promedio_peso_corporal)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(1);
	verificar_indice_timico(1);
	verificar_indice_hepatico(1);

});
$('input[name=peso_corporal_2]').change(function(event){
	verificar_peso_corporal();
	promedio_peso_corporal = parseFloat($("input[name=peso_corporal_1]").val()) + parseFloat($("input[name=peso_corporal_2]").val()) + parseFloat($("input[name=peso_corporal_3]").val()) + parseFloat($("input[name=peso_corporal_4]").val()) + parseFloat($("input[name=peso_corporal_5]").val());
	$("input[name=peso_corporal_6]").val((parseFloat(promedio_peso_corporal)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(2);
	verificar_indice_timico(2);
	verificar_indice_hepatico(2);
});
$('input[name=peso_corporal_3]').change(function(event){
	verificar_peso_corporal();
	promedio_peso_corporal = parseFloat($("input[name=peso_corporal_1]").val()) + parseFloat($("input[name=peso_corporal_2]").val()) + parseFloat($("input[name=peso_corporal_3]").val()) + parseFloat($("input[name=peso_corporal_4]").val()) + parseFloat($("input[name=peso_corporal_5]").val());
	$("input[name=peso_corporal_6]").val((parseFloat(promedio_peso_corporal)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(3);
	verificar_indice_timico(3);
	verificar_indice_hepatico(3);
});
$('input[name=peso_corporal_4]').change(function(event){
	verificar_peso_corporal();
	promedio_peso_corporal = parseFloat($("input[name=peso_corporal_1]").val()) + parseFloat($("input[name=peso_corporal_2]").val()) + parseFloat($("input[name=peso_corporal_3]").val()) + parseFloat($("input[name=peso_corporal_4]").val()) + parseFloat($("input[name=peso_corporal_5]").val());
	$("input[name=peso_corporal_6]").val((parseFloat(promedio_peso_corporal)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(4);
	verificar_indice_timico(4);
	verificar_indice_hepatico(4);
});
$('input[name=peso_corporal_5]').change(function(event){
	verificar_peso_corporal();
	promedio_peso_corporal = parseFloat($("input[name=peso_corporal_1]").val()) + parseFloat($("input[name=peso_corporal_2]").val()) + parseFloat($("input[name=peso_corporal_3]").val()) + parseFloat($("input[name=peso_corporal_4]").val()) + parseFloat($("input[name=peso_corporal_5]").val());
	$("input[name=peso_corporal_6]").val((parseFloat(promedio_peso_corporal)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(5);
	verificar_indice_timico(5);
	verificar_indice_hepatico(5);
});
function verificar_peso_corporal(){
	if ($("input[name=peso_corporal_1]").val() == "") { $("input[name=peso_corporal_1]").val(0)}
	if ($("input[name=peso_corporal_2]").val() == "") { $("input[name=peso_corporal_2]").val(0)}
	if ($("input[name=peso_corporal_3]").val() == "") { $("input[name=peso_corporal_3]").val(0)}
	if ($("input[name=peso_corporal_4]").val() == "") { $("input[name=peso_corporal_4]").val(0)}
	if ($("input[name=peso_corporal_5]").val() == "") { $("input[name=peso_corporal_5]").val(0)} 
}

///CALCULAR PESO DE BURSA
$('input[name=peso_bursa_1]').change(function(event){
 	verificar_peso_bursa();
	promedio_peso_bursa = parseFloat($("input[name=peso_bursa_1]").val()) + parseFloat($("input[name=peso_bursa_2]").val()) + parseFloat($("input[name=peso_bursa_3]").val()) + parseFloat($("input[name=peso_bursa_4]").val()) + parseFloat($("input[name=peso_bursa_5]").val());
	$("input[name=peso_bursa_6]").val((parseFloat(promedio_peso_bursa)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(1);
});
$('input[name=peso_bursa_2]').change(function(event){
 	verificar_peso_bursa();
	promedio_peso_bursa = parseFloat($("input[name=peso_bursa_1]").val()) + parseFloat($("input[name=peso_bursa_2]").val()) + parseFloat($("input[name=peso_bursa_3]").val()) + parseFloat($("input[name=peso_bursa_4]").val()) + parseFloat($("input[name=peso_bursa_5]").val());
	$("input[name=peso_bursa_6]").val((parseFloat(promedio_peso_bursa)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(2);
});
$('input[name=peso_bursa_3]').change(function(event){
 	verificar_peso_bursa();
	promedio_peso_bursa = parseFloat($("input[name=peso_bursa_1]").val()) + parseFloat($("input[name=peso_bursa_2]").val()) + parseFloat($("input[name=peso_bursa_3]").val()) + parseFloat($("input[name=peso_bursa_4]").val()) + parseFloat($("input[name=peso_bursa_5]").val());
	$("input[name=peso_bursa_6]").val((parseFloat(promedio_peso_bursa)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(3);
});
$('input[name=peso_bursa_4]').change(function(event){
 	verificar_peso_bursa();
	promedio_peso_bursa = parseFloat($("input[name=peso_bursa_1]").val()) + parseFloat($("input[name=peso_bursa_2]").val()) + parseFloat($("input[name=peso_bursa_3]").val()) + parseFloat($("input[name=peso_bursa_4]").val()) + parseFloat($("input[name=peso_bursa_5]").val());
	$("input[name=peso_bursa_6]").val((parseFloat(promedio_peso_bursa)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(4);
});
$('input[name=peso_bursa_5]').change(function(event){
 	verificar_peso_bursa();
	promedio_peso_bursa = parseFloat($("input[name=peso_bursa_1]").val()) + parseFloat($("input[name=peso_bursa_2]").val()) + parseFloat($("input[name=peso_bursa_3]").val()) + parseFloat($("input[name=peso_bursa_4]").val()) + parseFloat($("input[name=peso_bursa_5]").val());
	$("input[name=peso_bursa_6]").val((parseFloat(promedio_peso_bursa)/parseFloat(5)).toFixed(2));
	verificar_indice_bursal(5);
});
function verificar_peso_bursa(){
	if ($("input[name=peso_bursa_1]").val() == "") { $("input[name=peso_bursa_1]").val(0)}
	if ($("input[name=peso_bursa_2]").val() == "") { $("input[name=peso_bursa_2]").val(0)}
	if ($("input[name=peso_bursa_3]").val() == "") { $("input[name=peso_bursa_3]").val(0)}
	if ($("input[name=peso_bursa_4]").val() == "") { $("input[name=peso_bursa_4]").val(0)}
	if ($("input[name=peso_bursa_5]").val() == "") { $("input[name=peso_bursa_5]").val(0)}
}
function verificar_indice_bursal(id){
	if ($("input[name=peso_corporal_"+id+"]").val() > 0) {	
		verificar_indice_bursal_valor();	
		$("input[name=indice_bursal_"+id+"]").val(((parseFloat($("input[name=peso_bursa_"+id+"]").val()) / parseFloat($("input[name=peso_corporal_"+id+"]").val())) * 1000).toFixed(2));		
		promedio_indice_bursal = parseFloat($("input[name=indice_bursal_1]").val()) + parseFloat($("input[name=indice_bursal_2]").val()) + parseFloat($("input[name=indice_bursal_3]").val()) + parseFloat($("input[name=indice_bursal_4]").val()) + parseFloat($("input[name=indice_bursal_5]").val());
		$("input[name=indice_bursal_6]").val((parseFloat(promedio_indice_bursal)/parseFloat(5)).toFixed(2));		
	}else{
		$("input[name=indice_bursal_"+id+"]").val(0);				
		verificar_indice_bursal_valor();	
		promedio_indice_bursal = parseFloat($("input[name=indice_bursal_1]").val()) + parseFloat($("input[name=indice_bursal_2]").val()) + parseFloat($("input[name=indice_bursal_3]").val()) + parseFloat($("input[name=indice_bursal_4]").val()) + parseFloat($("input[name=indice_bursal_5]").val());
		$("input[name=indice_bursal_6]").val((parseFloat(promedio_indice_bursal)/parseFloat(5)).toFixed(2));		
	}
}
function verificar_indice_bursal_valor(){
	if ($("input[name=indice_bursal_1]").val() == "") { $("input[name=indice_bursal_1]").val(0)}
	if ($("input[name=indice_bursal_2]").val() == "") { $("input[name=indice_bursal_2]").val(0)}
	if ($("input[name=indice_bursal_3]").val() == "") { $("input[name=indice_bursal_3]").val(0)}
	if ($("input[name=indice_bursal_4]").val() == "") { $("input[name=indice_bursal_4]").val(0)}
	if ($("input[name=indice_bursal_5]").val() == "") { $("input[name=indice_bursal_5]").val(0)}	
}



///CALCULAR PESO DE BAZO
$('input[name=peso_bazo_1]').change(function(event){
	verificar_peso_bazo();		
	promedio_peso_bazo = parseFloat($("input[name=peso_bazo_1]").val()) + parseFloat($("input[name=peso_bazo_2]").val()) + parseFloat($("input[name=peso_bazo_3]").val()) + parseFloat($("input[name=peso_bazo_4]").val()) + parseFloat($("input[name=peso_bazo_5]").val());
	$("input[name=peso_bazo_6]").val((parseFloat(promedio_peso_bazo)/parseFloat(5)).toFixed(2));
});
$('input[name=peso_bazo_2]').change(function(event){
	verificar_peso_bazo();		
	promedio_peso_bazo = parseFloat($("input[name=peso_bazo_1]").val()) + parseFloat($("input[name=peso_bazo_2]").val()) + parseFloat($("input[name=peso_bazo_3]").val()) + parseFloat($("input[name=peso_bazo_4]").val()) + parseFloat($("input[name=peso_bazo_5]").val());
	$("input[name=peso_bazo_6]").val((parseFloat(promedio_peso_bazo)/parseFloat(5)).toFixed(2));
});
$('input[name=peso_bazo_3]').change(function(event){
	verificar_peso_bazo();		
	promedio_peso_bazo = parseFloat($("input[name=peso_bazo_1]").val()) + parseFloat($("input[name=peso_bazo_2]").val()) + parseFloat($("input[name=peso_bazo_3]").val()) + parseFloat($("input[name=peso_bazo_4]").val()) + parseFloat($("input[name=peso_bazo_5]").val());
	$("input[name=peso_bazo_6]").val((parseFloat(promedio_peso_bazo)/parseFloat(5)).toFixed(2));
});
$('input[name=peso_bazo_4]').change(function(event){
	verificar_peso_bazo();		
	promedio_peso_bazo = parseFloat($("input[name=peso_bazo_1]").val()) + parseFloat($("input[name=peso_bazo_2]").val()) + parseFloat($("input[name=peso_bazo_3]").val()) + parseFloat($("input[name=peso_bazo_4]").val()) + parseFloat($("input[name=peso_bazo_5]").val());
	$("input[name=peso_bazo_6]").val((parseFloat(promedio_peso_bazo)/parseFloat(5)).toFixed(2));
});
$('input[name=peso_bazo_5]').change(function(event){
	verificar_peso_bazo();		
	promedio_peso_bazo = parseFloat($("input[name=peso_bazo_1]").val()) + parseFloat($("input[name=peso_bazo_2]").val()) + parseFloat($("input[name=peso_bazo_3]").val()) + parseFloat($("input[name=peso_bazo_4]").val()) + parseFloat($("input[name=peso_bazo_5]").val());
	$("input[name=peso_bazo_6]").val((parseFloat(promedio_peso_bazo)/parseFloat(5)).toFixed(2));
});
function verificar_peso_bazo(){
	if ($("input[name=peso_bazo_1]").val() == "") { $("input[name=peso_bazo_1]").val(0)}
	if ($("input[name=peso_bazo_2]").val() == "") { $("input[name=peso_bazo_2]").val(0)}
	if ($("input[name=peso_bazo_3]").val() == "") { $("input[name=peso_bazo_3]").val(0)}
	if ($("input[name=peso_bazo_4]").val() == "") { $("input[name=peso_bazo_4]").val(0)}
	if ($("input[name=peso_bazo_5]").val() == "") { $("input[name=peso_bazo_5]").val(0)} 	
}





///CALCULAR PESO TIMO
$('input[name=peso_timo_1]').change(function(event){
	verificar_peso_timo();
	promedio_peso_timo = parseFloat($("input[name=peso_timo_1]").val()) + parseFloat($("input[name=peso_timo_2]").val()) + parseFloat($("input[name=peso_timo_3]").val()) + parseFloat($("input[name=peso_timo_4]").val()) + parseFloat($("input[name=peso_timo_5]").val());
	$("input[name=peso_timo_6]").val((parseFloat(promedio_peso_timo)/parseFloat(5)).toFixed(2));
	verificar_indice_timico(1);	
});
$('input[name=peso_timo_2]').change(function(event){
	verificar_peso_timo();
	promedio_peso_timo = parseFloat($("input[name=peso_timo_1]").val()) + parseFloat($("input[name=peso_timo_2]").val()) + parseFloat($("input[name=peso_timo_3]").val()) + parseFloat($("input[name=peso_timo_4]").val()) + parseFloat($("input[name=peso_timo_5]").val());
	$("input[name=peso_timo_6]").val((parseFloat(promedio_peso_timo)/parseFloat(5)).toFixed(2));
	verificar_indice_timico(2);	
});
$('input[name=peso_timo_3]').change(function(event){
	verificar_peso_timo();
	promedio_peso_timo = parseFloat($("input[name=peso_timo_1]").val()) + parseFloat($("input[name=peso_timo_2]").val()) + parseFloat($("input[name=peso_timo_3]").val()) + parseFloat($("input[name=peso_timo_4]").val()) + parseFloat($("input[name=peso_timo_5]").val());
	$("input[name=peso_timo_6]").val((parseFloat(promedio_peso_timo)/parseFloat(5)).toFixed(2));
	verificar_indice_timico(3);	
});
$('input[name=peso_timo_4]').change(function(event){
	verificar_peso_timo();
	promedio_peso_timo = parseFloat($("input[name=peso_timo_1]").val()) + parseFloat($("input[name=peso_timo_2]").val()) + parseFloat($("input[name=peso_timo_3]").val()) + parseFloat($("input[name=peso_timo_4]").val()) + parseFloat($("input[name=peso_timo_5]").val());
	$("input[name=peso_timo_6]").val((parseFloat(promedio_peso_timo)/parseFloat(5)).toFixed(2));
	verificar_indice_timico(4);	
});
$('input[name=peso_timo_5]').change(function(event){
	verificar_peso_timo();
	promedio_peso_timo = parseFloat($("input[name=peso_timo_1]").val()) + parseFloat($("input[name=peso_timo_2]").val()) + parseFloat($("input[name=peso_timo_3]").val()) + parseFloat($("input[name=peso_timo_4]").val()) + parseFloat($("input[name=peso_timo_5]").val());
	$("input[name=peso_timo_6]").val((parseFloat(promedio_peso_timo)/parseFloat(5)).toFixed(2));
	verificar_indice_timico(5);	
});
function verificar_peso_timo(){
	if ($("input[name=peso_timo_1]").val() == "") { $("input[name=peso_timo_1]").val(0)}
	if ($("input[name=peso_timo_2]").val() == "") { $("input[name=peso_timo_2]").val(0)}
	if ($("input[name=peso_timo_3]").val() == "") { $("input[name=peso_timo_3]").val(0)}
	if ($("input[name=peso_timo_4]").val() == "") { $("input[name=peso_timo_4]").val(0)}
	if ($("input[name=peso_timo_5]").val() == "") { $("input[name=peso_timo_5]").val(0)} 		
}
function verificar_indice_timico(id){
	if ($("input[name=peso_corporal_"+id+"]").val() > 0) {	
		verificar_indice_timico_valor();	
		$("input[name=indice_timico_"+id+"]").val(((parseFloat($("input[name=peso_timo_"+id+"]").val()) / parseFloat($("input[name=peso_corporal_"+id+"]").val())) * 1000).toFixed(2));		
		promedio_indice_timico = parseFloat($("input[name=indice_timico_1]").val()) + parseFloat($("input[name=indice_timico_2]").val()) + parseFloat($("input[name=indice_timico_3]").val()) + parseFloat($("input[name=indice_timico_4]").val()) + parseFloat($("input[name=indice_timico_5]").val());
		$("input[name=indice_timico_6]").val((parseFloat(promedio_indice_timico)/parseFloat(5)).toFixed(2));		
	}else{
		$("input[name=indice_timico_"+id+"]").val(0);	
		verificar_indice_timico_valor();	
		promedio_indice_timico = parseFloat($("input[name=indice_timico_1]").val()) + parseFloat($("input[name=indice_timico_2]").val()) + parseFloat($("input[name=indice_timico_3]").val()) + parseFloat($("input[name=indice_timico_4]").val()) + parseFloat($("input[name=indice_timico_5]").val());
		$("input[name=indice_timico_6]").val((parseFloat(promedio_indice_timico)/parseFloat(5)).toFixed(2));		
	}
}
function verificar_indice_timico_valor(){
	if ($("input[name=indice_timico_1]").val() == "") { $("input[name=indice_timico_1]").val(0)}
	if ($("input[name=indice_timico_2]").val() == "") { $("input[name=indice_timico_2]").val(0)}
	if ($("input[name=indice_timico_3]").val() == "") { $("input[name=indice_timico_3]").val(0)}
	if ($("input[name=indice_timico_4]").val() == "") { $("input[name=indice_timico_4]").val(0)}
	if ($("input[name=indice_timico_5]").val() == "") { $("input[name=indice_timico_5]").val(0)}	
}




///CALCULAR PESO HIGADO
$('input[name=peso_higado_1]').change(function(event){
	verificar_peso_higado();	
	promedio_peso_higado = parseFloat($("input[name=peso_higado_1]").val()) + parseFloat($("input[name=peso_higado_2]").val()) + parseFloat($("input[name=peso_higado_3]").val()) + parseFloat($("input[name=peso_higado_4]").val()) + parseFloat($("input[name=peso_higado_5]").val());
	$("input[name=peso_higado_6]").val((parseFloat(promedio_peso_higado)/parseFloat(5)).toFixed(2));
	verificar_indice_hepatico(1);	
});
$('input[name=peso_higado_2]').change(function(event){
	verificar_peso_higado();
	promedio_peso_higado = parseFloat($("input[name=peso_higado_1]").val()) + parseFloat($("input[name=peso_higado_2]").val()) + parseFloat($("input[name=peso_higado_3]").val()) + parseFloat($("input[name=peso_higado_4]").val()) + parseFloat($("input[name=peso_higado_5]").val());
	$("input[name=peso_higado_6]").val((parseFloat(promedio_peso_higado)/parseFloat(5)).toFixed(2));
	verificar_indice_hepatico(2);	
});
$('input[name=peso_higado_3]').change(function(event){
	verificar_peso_higado();
	promedio_peso_higado = parseFloat($("input[name=peso_higado_1]").val()) + parseFloat($("input[name=peso_higado_2]").val()) + parseFloat($("input[name=peso_higado_3]").val()) + parseFloat($("input[name=peso_higado_4]").val()) + parseFloat($("input[name=peso_higado_5]").val());
	$("input[name=peso_higado_6]").val((parseFloat(promedio_peso_higado)/parseFloat(5)).toFixed(2));
	verificar_indice_hepatico(3);	
});
$('input[name=peso_higado_4]').change(function(event){
	verificar_peso_higado();
	promedio_peso_higado = parseFloat($("input[name=peso_higado_1]").val()) + parseFloat($("input[name=peso_higado_2]").val()) + parseFloat($("input[name=peso_higado_3]").val()) + parseFloat($("input[name=peso_higado_4]").val()) + parseFloat($("input[name=peso_higado_5]").val());
	$("input[name=peso_higado_6]").val((parseFloat(promedio_peso_higado)/parseFloat(5)).toFixed(2));
	verificar_indice_hepatico(4);	
});
$('input[name=peso_higado_5]').change(function(event){
	verificar_peso_higado();
	promedio_peso_higado = parseFloat($("input[name=peso_higado_1]").val()) + parseFloat($("input[name=peso_higado_2]").val()) + parseFloat($("input[name=peso_higado_3]").val()) + parseFloat($("input[name=peso_higado_4]").val()) + parseFloat($("input[name=peso_higado_5]").val());
	$("input[name=peso_higado_6]").val((parseFloat(promedio_peso_higado)/parseFloat(5)).toFixed(2));
	verificar_indice_hepatico(5);	
});
function verificar_peso_higado(){
	if ($("input[name=peso_higado_1]").val() == "") { $("input[name=peso_higado_1]").val(0)}
	if ($("input[name=peso_higado_2]").val() == "") { $("input[name=peso_higado_2]").val(0)}
	if ($("input[name=peso_higado_3]").val() == "") { $("input[name=peso_higado_3]").val(0)}
	if ($("input[name=peso_higado_4]").val() == "") { $("input[name=peso_higado_4]").val(0)}
	if ($("input[name=peso_higado_5]").val() == "") { $("input[name=peso_higado_5]").val(0)}  		
}
function verificar_indice_hepatico(id){
	if ($("input[name=peso_corporal_"+id+"]").val() > 0) {	
		verificar_indice_hepatico_valor();	
		$("input[name=indice_hepatico_"+id+"]").val(((parseFloat($("input[name=peso_higado_"+id+"]").val()) / parseFloat($("input[name=peso_corporal_"+id+"]").val())) * 100).toFixed(2));		
		promedio_indice_hepatico = parseFloat($("input[name=indice_hepatico_1]").val()) + parseFloat($("input[name=indice_hepatico_2]").val()) + parseFloat($("input[name=indice_hepatico_3]").val()) + parseFloat($("input[name=indice_hepatico_4]").val()) + parseFloat($("input[name=indice_hepatico_5]").val());
		$("input[name=indice_hepatico_6]").val((parseFloat(promedio_indice_hepatico)/parseFloat(5)).toFixed(2));		
	}else{
		$("input[name=indice_hepatico_"+id+"]").val(0);	
		verificar_indice_hepatico_valor();	
		promedio_indice_hepatico = parseFloat($("input[name=indice_hepatico_1]").val()) + parseFloat($("input[name=indice_hepatico_2]").val()) + parseFloat($("input[name=indice_hepatico_3]").val()) + parseFloat($("input[name=indice_hepatico_4]").val()) + parseFloat($("input[name=indice_hepatico_5]").val());
		$("input[name=indice_hepatico_6]").val((parseFloat(promedio_indice_hepatico)/parseFloat(5)).toFixed(2));		
	}
}
function verificar_indice_hepatico_valor(){
	if ($("input[name=peso_higado_1]").val() == "") { $("input[name=peso_higado_1]").val(0)}
	if ($("input[name=peso_higado_2]").val() == "") { $("input[name=peso_higado_2]").val(0)}
	if ($("input[name=peso_higado_3]").val() == "") { $("input[name=peso_higado_3]").val(0)}
	if ($("input[name=peso_higado_4]").val() == "") { $("input[name=peso_higado_4]").val(0)}
	if ($("input[name=peso_higado_5]").val() == "") { $("input[name=peso_higado_5]").val(0)}	
}



/////CALCULAR BURSOMETRo
$('input[name=bursometro_1]').change(function(event){
	verificar_bursometro();		
	promedio_bursometro = parseFloat($("input[name=bursometro_1]").val()) + parseFloat($("input[name=bursometro_2]").val()) + parseFloat($("input[name=bursometro_3]").val()) + parseFloat($("input[name=bursometro_4]").val()) + parseFloat($("input[name=bursometro_5]").val());
	$("input[name=bursometro_6]").val((parseFloat(promedio_bursometro)/parseFloat(5)).toFixed(2));
});
$('input[name=bursometro_2]').change(function(event){
	verificar_bursometro();		
	promedio_bursometro = parseFloat($("input[name=bursometro_1]").val()) + parseFloat($("input[name=bursometro_2]").val()) + parseFloat($("input[name=bursometro_3]").val()) + parseFloat($("input[name=bursometro_4]").val()) + parseFloat($("input[name=bursometro_5]").val());
	$("input[name=bursometro_6]").val((parseFloat(promedio_bursometro)/parseFloat(5)).toFixed(2));
});
$('input[name=bursometro_3]').change(function(event){
	verificar_bursometro();		
	promedio_bursometro = parseFloat($("input[name=bursometro_1]").val()) + parseFloat($("input[name=bursometro_2]").val()) + parseFloat($("input[name=bursometro_3]").val()) + parseFloat($("input[name=bursometro_4]").val()) + parseFloat($("input[name=bursometro_5]").val());
	$("input[name=bursometro_6]").val((parseFloat(promedio_bursometro)/parseFloat(5)).toFixed(2));
});
$('input[name=bursometro_4]').change(function(event){
	verificar_bursometro();		
	promedio_bursometro = parseFloat($("input[name=bursometro_1]").val()) + parseFloat($("input[name=bursometro_2]").val()) + parseFloat($("input[name=bursometro_3]").val()) + parseFloat($("input[name=bursometro_4]").val()) + parseFloat($("input[name=bursometro_5]").val());
	$("input[name=bursometro_6]").val((parseFloat(promedio_bursometro)/parseFloat(5)).toFixed(2));
});
$('input[name=bursometro_5]').change(function(event){
	verificar_bursometro();		
	promedio_bursometro = parseFloat($("input[name=bursometro_1]").val()) + parseFloat($("input[name=bursometro_2]").val()) + parseFloat($("input[name=bursometro_3]").val()) + parseFloat($("input[name=bursometro_4]").val()) + parseFloat($("input[name=bursometro_5]").val());
	$("input[name=bursometro_6]").val((parseFloat(promedio_bursometro)/parseFloat(5)).toFixed(2));
});
function verificar_bursometro(){
	if ($("input[name=bursometro_1]").val() == "") { $("input[name=bursometro_1]").val(0)}
	if ($("input[name=bursometro_2]").val() == "") { $("input[name=bursometro_2]").val(0)}
	if ($("input[name=bursometro_3]").val() == "") { $("input[name=bursometro_3]").val(0)}
	if ($("input[name=bursometro_4]").val() == "") { $("input[name=bursometro_4]").val(0)}
	if ($("input[name=bursometro_5]").val() == "") { $("input[name=bursometro_5]").val(0)} 	
}



//PARA CARGAR LA IMAGEN CON CANVA
var imagen_1;
function cargarImagen(input, tipo) {
    if (tipo === 1 || tipo === "1") {
        imagen_1 = $(input);
        $("body").append("<input type='file' name='fotocargar' onchange='cargarImagen(this,2)' id='fotocargar' style='display: none;'/>\n\
            <canvas id='canvas' style='display: block;'></canvas>");
        $('#fotocargar').click();
        return;
    }

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#loading').css("display","block");                    
            var canvas = document.getElementById("canvas");
            var ctx = canvas.getContext('2d');
            var img = new Image();
            img.onload = function () {
                canvas.width = 300;
                canvas.height = 300;
                ctx.drawImage(img, 0, 0, 300, 300);
                imagen_1.attr("src", canvas.toDataURL(input.files[0].type));
                $("#imagen_1").val(canvas.toDataURL(input.files[0].type));
                //cargando(false);
                $("#fotocargar").remove();
                $("#canvas").remove();
            };
            img.src = reader.result;           
            $('#loading').css("display","none");            
        };
        reader.readAsDataURL(input.files[0]);
    }
}

///CARGAR
var imagen_2;
function cargarImagen(input, tipo) {
    if (tipo === 1 || tipo === "1") {
        imagen_2 = $(input);
        $("body").append("<input type='file' name='fotocargar' onchange='cargarImagen(this,2)' id='fotocargar' style='display: none;'/>\n\
            <canvas id='canvas' style='display: block;'></canvas>");
        $('#fotocargar').click();
        return;
    }

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#loading').css("display","block");                    
            var canvas = document.getElementById("canvas");
            var ctx = canvas.getContext('2d');
            var img = new Image();
            img.onload = function () {
                canvas.width = 300;
                canvas.height = 300;
                ctx.drawImage(img, 0, 0, 300, 300);
                imagen_2.attr("src", canvas.toDataURL(input.files[0].type));
                $("#imagen_2").val(canvas.toDataURL(input.files[0].type));
                //cargando(false);
                $("#fotocargar").remove();
                $("#canvas").remove();
            };
            img.src = reader.result;           
            $('#loading').css("display","none");            
        };
        reader.readAsDataURL(input.files[0]);
    }
}







/////CARGAR IMAGENES
function cargar_imagen(evt) {
    var files = evt.target.files; // FileList object
    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
      //Solo admitimos imágenes.
      if (!f.type.match('image.*')) {
          continue;
      }
      var reader = new FileReader();
      reader.onload = (function(theFile) {
          return function(e) {
            // Insertamos la imagen            
           document.getElementById("list_"+img).innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '" width="350px" height="250px"/>'].join('');
          };
      })(f);
      reader.readAsDataURL(f);
    }
}
document.getElementById('imagen_1').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_2').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_3').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_4').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_5').addEventListener('change', cargar_imagen, false);
/*document.getElementById('imagen_6').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_7').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_8').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_9').addEventListener('change', cargar_imagen, false);
document.getElementById('imagen_10').addEventListener('change', cargar_imagen, false);*/

img = 0;
function id_img(id){
    img = id;
}


cont = 1;//CONTADOR PARA LAS IMAGENS
function add_imagen(){
	if (cont < 6) {
		$("#div_img"+cont).show();
		cont++;
	}
}

function eliminar_imagen(){
	if (cont>1) {
		cont--;	
		$("#div_img"+cont).hide();
		document.getElementById("list_"+cont).innerHTML ="";  
		$("#imagen_"+cont).val("");	
	}
}





function Validar_SIM_Guardar(){
	if ($('select[name=empresa]').val() == 0 || $('select[name=granja]').val() == 0 || $('input[name=zona]').val() == "" || $('input[name=edad]').val() == 0 || $('select[name=sexo]').val() == "" || $('input[name=nro_pollos]').val() == "" || $('input[name=fecha]').val() == "") {
	  //if ($('#detalle').val()=="") {alertify.error('No introdujo el campo Detalle'); $('#div_detalle').addClass('has-error');}else{$('#div_detalle').removeClass('has-error');}		
	  if ($('select[name=empresa]').val()==0) {alertify.error('No introdujo el campo Empresa'); $('#div_empresa').addClass('has-error');}else{$('#div_empresa').removeClass('has-error');}		
	  if ($('select[name=granja]').val()==0) {alertify.error('No introdujo el campo Granja'); $('#div_granja').addClass('has-error');}else{$('#div_granja').removeClass('has-error');}		
	  if ($('input[name=zona]').val()=="") {alertify.error('No introdujo el campo Zona'); $('#div_zona').addClass('has-error');}else{$('#div_zona').removeClass('has-error');}		
	  if ($('select[name=galpon]').val()==0) {alertify.error('No introdujo el campo Galpon'); $('#div_galpon').addClass('has-error');}else{$('#div_galpon').removeClass('has-error');}		
	  if ($('input[name=edad]').val()==0) {alertify.error('No introdujo el campo Edad'); $('#div_edad').addClass('has-error');}else{$('#div_edad').removeClass('has-error');}		
	  if ($('select[name=sexo]').val()=="") {alertify.error('No introdujo el campo Sexo'); $('#div_sexo').addClass('has-error');}else{$('#div_sexo').removeClass('has-error');}		
	  if ($('input[name=nro_pollos]').val()=="") {alertify.error('No introdujo el campo Nro de Pollos'); $('#div_nro_pollos').addClass('has-error');}else{$('#div_nro_pollos').removeClass('has-error');}		
	  if ($('input[name=fecha]').val()=="") {alertify.error('No introdujo el campo Fecha'); $('#div_fecha').addClass('has-error');}else{$('#div_fecha').removeClass('has-error');}		
//	  if ($('#imagen').val()=="") {alertify.error('No introdujo el campo Imagen'); $('#div_imagen').addClass('has-error');}else{$('#div_imagen').removeClass('has-error');}		
		$('#loading').css("display","none"); 
		$('#btn_registrar').show();	        
		return false; 		
	}else{
		$('#div_empresa').removeClass('has-error');								
		$('#div_granja').removeClass('has-error');								
		$('#div_zona').removeClass('has-error');								
		$('#div_galpon').removeClass('has-error');								
		$('#div_edad').removeClass('has-error');								
		$('#div_sexo').removeClass('has-error');								
		$('#div_nro_pollos').removeClass('has-error');								
		$('#div_fecha').removeClass('has-error');								
		return true; 		
		$('#loading').css("display","none"); 
	}



	/*if ($('select[name=carrera]').val() == 0) {
		alertify.alert('ADVERTENCIA','NO SELECCIONO UNA CARRERA'); 
		$('#loading').css("display","none"); 
		$('#btn_registrar').show();	        
		return false; 		
	}
	switch($('select[name=tipo]').val()) {
	case '0':
		alertify.alert('ADVERTENCIA','NO SELECCIONO UN TIPO DE PUBLICACION'); 
		$('#loading').css("display","none"); 
		$('#btn_registrar').show();	        
		return false; 
		break;
	}*/
}








