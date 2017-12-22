<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Hash;
use Auth;

class ReportesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }



//////////////////////////////////////////////////////////////
//////////SISTEMA INTEGRAL DE MONITOREO POR EMPRESA///////////
//////////////////////////////////////////////////////////////
    public function sistema_integral_monitoreo(){
        $buscar_empresa=DB::select("SELECT *from empresa ORDER BY empresa.nombre");
        return view('sistema_integral_monitoreo.sistema_integral_monitoreo', compact('buscar_empresa'));        
    }
    function BuscarGranja($idEmpresa){
        $granja=DB::select("SELECT *FROM granja WHERE granja.id_empresa=".$idEmpresa." ORDER BY granja.nombre");
        return response()->json($granja);
    }

    public function SistemaIntegralMonitoreo($idEmpresa, $idGranja, $fechaInicio, $fechaFin, $dia1, $dia2){
        switch ($idEmpresa) {
            case 0: //SI ES IGUAL A CERO SIGNIFICA DE TODAS LAS EMPRESAS
                if ($dia2==0 && $dia1==0) {//SIGNIFICA DE TODAS LAS EDADES
                    $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");                     
                } else {//UNA EDAD ESPECIFICA
                    $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");                     
                }            
                return response()->json($datos);                   
                break;            
            default:
                if ($idGranja == 0) { //SI ES IGUAL A CERO SIGNIFICA DE TODAS LAS GRANJAS
                    if ($dia2==0 && $dia1==0) {//SIGNIFICA DE TODAS LAS EDADES
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");                     
                    } else {//UNA EDAD ESPECIFICA
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");      
                    }                                   
                    return response()->json($datos);                  
                } else { //CASO CONTRARIO SIGINIFICA DE UNA GRANJA ESPECIFICA
                    if ($dia2==0 && $dia1==0) {//SIGNIFICA DE TODAS LAS EDADES
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND granja.id=".$idGranja." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");                       
                    } else {//UNA EDAD ESPECIFICA
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND granja.id=".$idGranja." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");       
                    }                     
                    return response()->json($datos);                     
                }                
                break;
        }
    }

    public function SistemaIntegralMonitoreoExcel($idEmpresa, $idGranja, $fechaInicio, $fechaFin, $dia1, $dia2){
        switch ($idEmpresa) {
            case 0: //SI ES IGUAL A CERO SIGNIFICA DE TODAS LAS EMPRESAS
                $titulo=DB::select("SELECT 'SistemaIntegralMonitoreo'as titulo,'0'as emp,'TODAS LAS EMPRESAS'as empresa, '0'as gra,'GRANJA'as granja, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin, ".$dia1." as dia1, ".$dia2." as dia2");
                if ($dia1==0 && $dia2==0) {//SIGNIFICA DE TODOS LOS DIAS O EDADES
                    $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");
                } else {//SIGNIFICA DE UNA EDAD ESPECIFICA
                    $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");
                }            
                return view('excel.sistema_integral_monitoreo_excel', compact('datos','titulo'));                
                break;            
            default:
                if ($idGranja == 0) { //SI ES IGUAL A CERO SIGNIFICA DE TODAS ALS GRANJAS
                    $titulo=DB::select("SELECT 'SistemaIntegralMonitoreo'as titulo,'1'as emp,'EMPRESA'as empresa, '0'as gra,'TODAS SUS GRANJAS'as granja, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin, ".$dia1." as dia1, ".$dia2." as dia2");
                    if ($dia1==0 && $dia2==0) {//SIGNIFICA DE TODOS LOS DIAS O EDADES
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");
                    } else {//SIGNIFICA DE UNA EDAD ESPECIFICA
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");
                    }                                          
                    return view('excel.sistema_integral_monitoreo_excel', compact('datos','titulo'));                                            
                } else { //CASO CONTRARIO SIGINIFICA DE UNA GRANJA ESPECIFICA
                    $titulo=DB::select("SELECT 'SistemaIntegralMonitoreo'as titulo,'1'as emp,'EMPRESA'as empresa, '1'as gra,'GRANJA ESPECIFICA'as granja, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin, ".$dia1." as dia1, ".$dia2." as dia2");
                    if ($dia1==0 && $dia2==0) {//SIGNIFICA DE TODOS LOS DIAS O EDADES
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND granja.id=".$idGranja." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");
                    } else {//SIGNIFICA DE UNA EDAD ESPECIFICA
                        $datos=DB::select("SELECT empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND empresa.id=".$idEmpresa." AND granja.id=".$idGranja." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY empresa.nombre,granja.nombre,sistema_integral.fecha");
                    }
                    return view('excel.sistema_integral_monitoreo_excel', compact('datos','titulo'));                                                   
                }                
                break;
        }
    }

///////////////////////////////////////////////////////////
//////////SISTEMA INTEGRAL DE MONITOREO POR PAIS///////////
///////////////////////////////////////////////////////////

    public function sistema_integral_monitoreo_pais(){
        $buscar_pais=DB::select("SELECT *from pais WHERE pais.id=1 ORDER BY pais.nombre");
        $buscar_ciudad=DB::select("SELECT ciudad.* from ciudad,pais WHERE ciudad.id_pais=pais.id and ciudad.id_pais=1 ORDER BY ciudad.nombre");
        return view('sistema_integral_monitoreo.sistema_integral_monitoreo_pais', compact('buscar_pais','buscar_ciudad'));        
    }
    function BuscarCiudad($idPais){
        $ciudad=DB::select("SELECT * FROM ciudad WHERE ciudad.id_pais=".$idPais." ORDER BY ciudad.nombre");
        return response()->json($ciudad);
    }

    public function SistemaIntegralMonitoreoPais($idPais, $idCiudad, $fechaInicio, $fechaFin, $dia1, $dia2){
        switch ($idPais) {
            case 0: //SI ES IGUAL A CERO SIGNIFICA DE TODAS LAS EMPRESAS
                if ($dia1==0 && $dia2==0) {//SIGNIFICA Q ES TODAS LAS EDADES
                    $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");
                } else {//SIGNIFICA UNAS EDADES ESPEFICICA
                    $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");
                }            
                return response()->json($datos);                   
                break;            
            default:
                if ($idCiudad == 0) { //SI ES IGUAL A CERO SIGNIFICA DE TODAS ALS GRANJAS
                    if ($dia1==0 && $dia2==0) {//SIGNIFICA Q ES TODAS LAS EDADES
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");
                    } else {//SIGNIFICA UNAS EDADES ESPEFICICA
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");
                    }                    
                    return response()->json($datos);                  
                } else { //CASO CONTRARIO SIGINIFICA DE UNA GRANJA ESPECIFICA
                    if ($dia1==0 && $dia2==0) {//SIGNIFICA Q ES TODAS LAS EDADES
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND ciudad.id=".$idCiudad." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");
                    } else {//SIGNIFICA UNAS EDADES ESPEFICICA
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND ciudad.id=".$idCiudad." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");
                    }                     
                    return response()->json($datos);                     
                }                
                break;
        }
    }


    public function SistemaIntegralMonitoreoPaisExcel($idPais, $idCiudad, $fechaInicio, $fechaFin, $dia1, $dia2){
        switch ($idPais) {
            case 0: //SI ES IGUAL A CERO SIGNIFICA DE TODOS LOS PAISES
                $titulo=DB::select("SELECT 'SistemaIntegralMonitoreoPais'as titulo,'0'as pa,'TODOS LOS PAISES'as pais, '0'as ciu,'CIUDAD'as ciudad, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin, ".$dia1." as dia1, ".$dia2." as dia2");
                if ($dia1==0 && $dia2==0) {//SIGNIFICA DE TODAS LAS EDADES
                    $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");                    
                } else {//SIGNIFICA DE UNA EDAD ESPEFICICA
                    $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");                    
                }
                return view('excel.sistema_integral_monitoreo_pais_excel', compact('datos','titulo'));                
                break;            
            default:
                if ($idCiudad == 0) { //SI ES IGUAL A CERO SIGNIFICA DE TODAS LAS CIUDADES
                    $titulo=DB::select("SELECT 'SistemaIntegralMonitoreoPais'as titulo,'1'as pa,'PAIS'as pais, '0'as ciu,'TODAS LAS CIUDADES'as ciudad, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin, ".$dia1." as dia1, ".$dia2." as dia2");         
                    if ($dia1==0 && $dia2==0) {//SIGNIFICA DE TODAS LAS EDADES
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");                    
                    } else {//SIGNIFICA DE UNA EDAD ESPEFICICA
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");                   
                    }                     
                    return view('excel.sistema_integral_monitoreo_pais_excel', compact('datos','titulo'));                                            
                } else { //CASO CONTRARIO SIGINIFICA DE UNA CIUDAD ESPECIFICA
                    $titulo=DB::select("SELECT 'SistemaIntegralMonitoreoPais'as titulo,'1'as pa,'PAIS'as pais, '1'as ciu,'CIUDAD ESPECIFICA'as ciudad, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin, ".$dia1." as dia1, ".$dia2." as dia2");
                    if ($dia1==0 && $dia2==0) {//SIGNIFICA DE TODAS LAS EDADES
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND ciudad.id=".$idCiudad." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");                    
                    } else {//SIGNIFICA DE UNA EDAD ESPEFICICA
                        $datos=DB::select("SELECT pais.nombre as pais,ciudad.nombre as ciudad,empresa.id as idEmpresa,granja.id as idGranja,DATE_FORMAT(sistema_integral.fecha, '%d - %m - %Y')as fecha,sistema_integral.edad,sistema_integral.sexo,empresa.nombre as empresa,granja.nombre as granja,peso.* FROM empresa,granja,sistema_integral,peso,ciudad,pais WHERE empresa.id=granja.id_empresa AND granja.id=sistema_integral.id_granja AND empresa.id=sistema_integral.id_empresa AND sistema_integral.id=peso.id_sistema AND pais.id=ciudad.id_pais AND ciudad.id=empresa.id_ciudad AND pais.id=".$idPais." AND ciudad.id=".$idCiudad." AND peso.id=6 AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND DATE_SUB('".$fechaFin."', INTERVAL -1 DAY) AND sistema_integral.edad BETWEEN ".$dia1." AND ".$dia2." ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre,sistema_integral.fecha");                   
                    }                      
                    return view('excel.sistema_integral_monitoreo_pais_excel', compact('datos','titulo'));                                                   
                }                
                break;
        }
    }





//////////////////////////////////////////////////////////////////////
//////////SISTEMA INTEGRAL DE MONITOREO VISITAS A EMPRESASA///////////
//////////////////////////////////////////////////////////////////////
    public function sistema_integral_monitoreo_visitas(){
        $buscar_empresa=DB::select("SELECT *from empresa ORDER BY empresa.nombre");
        return view('sistema_integral_monitoreo.sistema_integral_monitoreo_visitas', compact('buscar_empresa'));        
    }

    public function SistemaIntegralMonitoreoVisitas($idEmpresa, $fechaInicio, $fechaFin){
        switch ($idEmpresa) {
            case 0: //SI ES IGUAL A CERO SIGNIFICA DE TODAS LAS EMPRESAS
                $datos=DB::select("SELECT empresa.id as idEmpresa,pais.nombre as pais, ciudad.nombre as ciudad,empresa.nombre as empresa,granja.nombre as granja,COUNT(*)as visitas FROM empresa,granja,sistema_integral,ciudad,pais WHERE empresa.id=granja.id_empresa AND sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND pais.id=ciudad.id_pais and ciudad.id=empresa.id_ciudad AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin."' GROUP BY granja.id ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre");  
                return response()->json($datos);                   
                break;
            
            default:     //SI ES IGUAL A CERO SIGNIFICA UNA EMPRESA ESPECIFICA
                $datos=DB::select("SELECT empresa.id as idEmpresa,pais.nombre as pais, ciudad.nombre as ciudad,empresa.nombre as empresa,granja.nombre as granja,COUNT(*)as visitas FROM empresa,granja,sistema_integral,ciudad,pais WHERE empresa.id=granja.id_empresa AND sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND pais.id=ciudad.id_pais and ciudad.id=empresa.id_ciudad AND empresa.id=".$idEmpresa." AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin."' GROUP BY granja.id ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre");  
                return response()->json($datos);                  
                break;
        }
    }

    public function SistemaIntegralMonitoreoVisitasExcel($idEmpresa, $fechaInicio, $fechaFin){
        switch ($idEmpresa) {
            case 0: //SI ES IGUAL A CERO SIGNIFICA DE TODAS LAS EMPRESAS
                $titulo=DB::select("SELECT 'SistemaIntegralMonitoreoVisitas'as titulo,'0'as emp,'TODAS LAS EMPRESAS'as empresa, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin");
                $datos=DB::select("SELECT empresa.id as idEmpresa,pais.nombre as pais, ciudad.nombre as ciudad,empresa.nombre as empresa,granja.nombre as granja,COUNT(*)as visitas FROM empresa,granja,sistema_integral,ciudad,pais WHERE empresa.id=granja.id_empresa AND sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND pais.id=ciudad.id_pais and ciudad.id=empresa.id_ciudad AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin."' GROUP BY granja.id ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre");  
                return view('excel.sistema_integral_monitoreo_visitas_excel', compact('datos','titulo'));                
                break;
            
            default: //SI ES IGUAL A CERO SIGNIFICA UNA EMPRESA ESPECIFICA
                $titulo=DB::select("SELECT 'SistemaIntegralMonitoreoVisitas'as titulo,'1'as emp,'EMPRESA'as empresa, DATE_FORMAT('".$fechaInicio."', '%d-%m-%Y')as fecha_inicio,DATE_FORMAT('".$fechaFin."', '%d-%m-%Y')as fecha_fin");
                $datos=DB::select("SELECT empresa.id as idEmpresa,pais.nombre as pais, ciudad.nombre as ciudad,empresa.nombre as empresa,granja.nombre as granja,COUNT(*)as visitas FROM empresa,granja,sistema_integral,ciudad,pais WHERE empresa.id=granja.id_empresa AND sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND pais.id=ciudad.id_pais and ciudad.id=empresa.id_ciudad AND empresa.id=".$idEmpresa." AND sistema_integral.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin."' GROUP BY granja.id ORDER BY pais.nombre,ciudad.nombre,empresa.nombre,granja.nombre");                   
                    return view('excel.sistema_integral_monitoreo_visitas_excel', compact('datos','titulo'));                                            
                break;
        }
    }




















    public function hoja_de_verificacion(){
        $buscar_tecnico=DB::select("SELECT *from tecnico");
        return view('reportes.hoja_de_verificacion', compact('buscar_tecnico',$buscar_tecnico));        
    }
    public function hoja_de_verificacion_busqueda($fecha_inicio, $fecha_fin, $id_tecnico){
       // return response($datos);    
    }

    public function maquina_twin_shot(){
        $buscar_tecnico=DB::select("SELECT *from tecnico");
        return view('reportes.maquina_twin_shot', compact('buscar_tecnico',$buscar_tecnico));        
    }
    public function maquina_twin_shot_busqueda($fecha_inicio, $fecha_fin, $id_tecnico){
       // return response($datos);    
    }

    public function maquina_spravac(){
        $buscar_tecnico=DB::select("SELECT *from tecnico");
        return view('reportes.maquina_spravac', compact('buscar_tecnico',$buscar_tecnico));        
    }
    public function maquina_spravac_busqueda($fecha_inicio, $fecha_fin, $id_tecnico){
       // return response($datos);    
    }    

    public function maquina_zootec(){
        $buscar_tecnico=DB::select("SELECT *from tecnico");
        return view('reportes.maquina_zootec', compact('buscar_tecnico',$buscar_tecnico));        
    }

    public function maquina_zootec_busqueda($fecha_inicio, $fecha_fin, $id_tecnico){
       // return response($datos);    
    }  
}
