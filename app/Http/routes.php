<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//LOGIN
Route::resource('/','LoginController');
Route::resource('login','LoginController@store');
Route::resource('logout','LoginController@logout');

//errores
Route::get('error',function(){
	abort(404);
});

//CREAR ADMINISTRADORES
Route::resource("administrador","AdministradorController");

//USUARIOS
Route::resource("usuario","UsuarioController");

//SISTEMA INTEGRAL DE MONITOREO POR EMPRESA
Route::get("sistema_integral_monitoreo","ReportesController@sistema_integral_monitoreo");
Route::get("BuscarGranja/{idEmpresa}","ReportesController@BuscarGranja");
Route::get("SistemaIntegralMonitoreo/{idEmpresa}/{idGranja}/{fechaInicio}/{fechaFin}/{dia1}/{dia2}","ReportesController@SistemaIntegralMonitoreo");
Route::get("SistemaIntegralMonitoreoExcel/{idEmpresa}/{idGranja}/{fechaInicio}/{fechaFin}/{dia1}/{dia2}","ReportesController@SistemaIntegralMonitoreoExcel");

//SISTEMA INTEGRAL DE MONITOREO POR PAIS
Route::get("sistema_integral_monitoreo_pais","ReportesController@sistema_integral_monitoreo_pais");
Route::get("BuscarCiudad/{idPais}","ReportesController@BuscarCiudad");
Route::get("SistemaIntegralMonitoreoPais/{idPais}/{idCiudad}/{fechaInicio}/{fechaFin}/{dia1}/{dia2}","ReportesController@SistemaIntegralMonitoreoPais");
Route::get("SistemaIntegralMonitoreoPaisExcel/{idPais}/{idCiudad}/{fechaInicio}/{fechaFin}/{dia1}/{dia2}","ReportesController@SistemaIntegralMonitoreoPaisExcel");


//SISTEMA INTEGRAL DE MONITOREO VISITAS A EMPRESAS
Route::get("sistema_integral_monitoreo_visitas","ReportesController@sistema_integral_monitoreo_visitas");
Route::get("SistemaIntegralMonitoreoVisitas/{idEmpresa}/{fechaInicio}/{fechaFin}","ReportesController@SistemaIntegralMonitoreoVisitas");
Route::get("SistemaIntegralMonitoreoVisitasExcel/{idEmpresa}/{fechaInicio}/{fechaFin}","ReportesController@SistemaIntegralMonitoreoVisitasExcel");

/*
SELECT pais.nombre as pais, ciudad.nombre as ciudad,empresa.nombre as empresa,granja.nombre as granja,COUNT(*)as visitas FROM empresa,granja,sistema_integral,ciudad,pais WHERE empresa.id=granja.id_empresa AND sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND pais.id=ciudad.id_pais and
 ciudad.id=empresa.id_ciudad GROUP BY granja.id  
ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre*/


//HOJA DE VERIFICACION
Route::get("hoja_de_verificacion","ReportesController@hoja_de_verificacion");
Route::get("hoja_de_verificacion_busqueda/{fecha_inicio}/{fecha_fin}/{id_tecnico}","ReportesController@hoja_de_verificacion_busqueda");

//MANTENIMIENTO - MAQUINA TWIN SHOT
Route::get("maquina_twin_shot","ReportesController@maquina_twin_shot");
Route::get("maquina_twin_shot_busqueda/{fecha_inicio}/{fecha_fin}/{id_tecnico}","ReportesController@maquina_twin_shot_busqueda");

//MANTENIMIENTO - MAQUINA SPRAVAC
Route::get("maquina_spravac","ReportesController@maquina_spravac");
Route::get("maquina_spravac_busqueda/{fecha_inicio}/{fecha_fin}/{id_tecnico}","ReportesController@maquina_spravac_busqueda");

//MANTENIMIENTO - MAQUINA ZOOTEC
Route::get("maquina_zootec","ReportesController@maquina_zootec");
Route::get("maquina_zootec_busqueda/{fecha_inicio}/{fecha_fin}/{id_tecnico}","ReportesController@maquina_zootec_busqueda");



//EMPRESA
Route::resource("empresa","EmpresaController");
Route::get('BuscarEmpresa/{idEmpresa}','EmpresaController@BuscarEmpresa');
//GRANJA
Route::resource("granja","GranjaController");
Route::get('BuscarGranjas/{idGranja}','GranjaController@BuscarGranjas');

//GALPON
Route::resource("galpon","GalponController");
Route::get('BuscarGalpon/{idGalpon}','GalponController@BuscarGalpon');


//SCROLL
Route::get("scroll","EmpresaController@scroll");


///////GUARDAR DATOS
Route::resource("GuardarSIM","SIMController");
Route::get("BuscarGalpones/{idGranja}","SIMController@BuscarGalpones");
Route::get("Buscar_SIM/{fecha_inicio}/{fecha_fin}","SIMController@Buscar_SIM");

///PDF SIM
Route::get("SIM_PDF/{id}","SIMController@SIM_PDF");


///PDF SIM
Route::get("Vacunacion_PI_PDF","PDFController@Vacunacion_PI_PDF");

//SPRAVAC
Route::resource("Spravac","SpravacController");
Route::get("Buscar_Spravac/{fecha_inicio}/{fecha_fin}","SpravacController@Buscar_Spravac");
Route::get("MantenimientoSpravac_PDF/{id}","SpravacController@MantenimientoSpravac_PDF");

//ZOOTEC
Route::resource("Zootec","ZootecController");
Route::get("Buscar_Zootec/{fecha_inicio}/{fecha_fin}","ZootecController@Buscar_Zootec");
Route::get("MantenimientoZootec_PDF/{id}","ZootecController@MantenimientoZootec_PDF");