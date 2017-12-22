<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Empresa;
use App\Granja;
use App\Galpon;
use App\Ciudad;
use App\Peso;
use App\Sistema_Integral;
use App\Puntuacion;
use App\DetallePuntuacion;
use DB;
use Hash;
use Auth;

class SIMController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    public function index(){
        $sistema_integral=DB::table('sistema_integral')
        ->join('empresa','empresa.id','=','sistema_integral.id_empresa')
        ->join('granja','granja.id','=','sistema_integral.id_granja')
        ->join('galpon','galpon.id','=','sistema_integral.id_galpon')
        ->join('tecnico','tecnico.id','=','sistema_integral.id_tecnico')
        ->select('sistema_integral.*','empresa.nombre as empresa', 'granja.nombre as granja','granja.zona', 'galpon.codigo as galpon', 'tecnico.nombre as tecnico')
        ->orderBy('sistema_integral.fecha','desc')
        ->take(15)->get();
        //->paginate(10);
        return view('SIM.index',['sistema_integral'=>$sistema_integral]);        
    }
    function Buscar_SIM($fecha_inicio, $fecha_fin){
        $lista_SIM=DB::select("SELECT sistema_integral.*, empresa.nombre as empresa, granja.nombre as granja,granja.zona, galpon.codigo as galpon, tecnico.nombre as tecnico FROM sistema_integral,empresa,granja,galpon,tecnico WHERE sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND sistema_integral.id_galpon=galpon.id AND sistema_integral.id_tecnico=tecnico.id AND sistema_integral.fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' ORDER BY sistema_integral.fecha DESC");
        return response()->json($lista_SIM);
    }

    public function create(){
        $empresa=Empresa::orderBy('nombre','asc')->lists('nombre','id'); // 1 ES EL ID DEL PAIS BOLIVIA
        //$ciudad=Ciudad::where('id_pais','=',1)->lists('nombre','id'); // 1 ES EL ID DEL PAIS BOLIVIA
        return view('SIM.create',compact('empresa'));        
    }

    function BuscarGalpones($idGranja){
        $galpones=DB::select("SELECT *FROM galpon WHERE galpon.id_granja=".$idGranja." ORDER BY galpon.codigo");
        return response()->json($galpones);
    }


    public function store(Request $request){
        try {
          DB::beginTransaction();  
            $idSistemaIntegral=Sistema_Integral::create([
                'codigo' => "R.50",                 
                'revision' => "00",                 
                'edad' => $request['edad'],                 
                'sexo' => $request['sexo'],                 
                'observaciones' => $request['observaciones'],                 
                'fecha' => $request['fecha'],                 
                'nro_pollos' => $request['nro_pollos'],                 
                'id_galpon' => $request['galpon'],                 
                'id_granja' => $request['granja'],                 
                'id_empresa' => $request['empresa'],                 
                'id_sqlite' => "0",                 
                'imei' => "0",                 
                'firma_invetsa' => "",                 
                'firma_empresa' => "",                 
                'id_tecnico' => 1, //Aqui meter al id de un empleado q sera el q metera todo desde la computadora                
                'imagen_jefe' => "",                 
                'referencia' => $request['referencia'],                 
                'comentarios' => $request['comentarios'],               
            ]);

            for ($i=1; $i <= 6; $i++) { 
                Peso::create([
                'id' => $i,
                'peso_corporal' => $request['peso_corporal_'.$i],                 
                'peso_bursa' => $request['peso_bursa_'.$i],                 
                'peso_brazo' => $request['peso_bazo_'.$i],                 
                'peso_timo' => $request['peso_timo_'.$i],                 
                'peso_higado' => $request['peso_higado_'.$i],                 
                'indice_bursal' => $request['indice_bursal_'.$i],                 
                'indice_timico' => $request['indice_timico_'.$i],                 
                'indice_hepatico' => $request['indice_hepatico_'.$i],                 
                'bursometro' => $request['bursometro_'.$i],                 
                'imei' => "0",                 
                'id_sistema'=>$idSistemaIntegral['id'],
                ]); 
            }  

            //CARGAR PUNTUACION Y DETALLE_PUNDUACION
            $cont=1; $k=1; $j=1;
            for ($k=1; $k <= 19; $k++) { 
                $idPuntuacion=Puntuacion::create([ 'id'=>$k, 'nombre'=>$request['titulo_'.$k], 'id_sistema'=>$idSistemaIntegral['id'],'imei'=>'0' ]);//CARGA PUNTUACION            
                for ($j=1; $j <= $request['cont_'.$k]; $j++) { 
                    DetallePuntuacion::create([
                        'id'=>$j, 
                        'nombre'=>$request['nombre_'.$cont], 
                        'estado'=>$request['valor_'.$cont], 
                        'id_puntuacion'=>$k, 
                        'id_sistema'=>$idSistemaIntegral['id'], 
                        'imei'=>'0',
                    ]); //CARGA DETALLE PUNTUACION                
                    $cont++;
                }            
            }
            //CARGAR IMAGENES EN SISTEMA INTEGRAL
            $dir_imagen = "";
            for ($m=1; $m <= 5; $m++) { 
                if ($request['imagen_'.$m] != "") { //SI ESTA CON UNA FOTO INGRESA
                    $gestor = fopen($request['imagen_'.$m], "r");
                    $contenido = fread($gestor, filesize($request['imagen_'.$m]));
                    $contenido = base64_encode($contenido);
                    fclose($gestor);      
                    $dir_imagen = "invetsawebservice/sistema_integral_de_monitoreo/imagen/".$idSistemaIntegral['id']."_imagen_".$m."_".$request['fecha'].".txt";   
                    file_put_contents($dir_imagen, $contenido);

                    $dir_imagen = "sistema_integral_de_monitoreo/imagen/".$idSistemaIntegral['id']."_imagen_".$m."_".$request['fecha'].".txt";   
                    $SIM= Sistema_Integral::find($idSistemaIntegral['id']);//ACUALIZO LAS IMAGENES
                    $SIM->fill([ 'imagen'.$m => $dir_imagen]);                                                
                    $SIM->save(); 
                }                  
            }

            DB::commit(); 
            return redirect('GuardarSIM/create')->with('message','GUARDADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('GuardarSIM/create')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }                
    }

    public function edit($id){        
        $datos=DB::select("SELECT sistema_integral.*, empresa.nombre as empresa, granja.nombre as granja,granja.zona, galpon.codigo as galpon, tecnico.nombre as tecnico FROM sistema_integral,empresa,granja,galpon,tecnico WHERE sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND sistema_integral.id_galpon=galpon.id AND sistema_integral.id_tecnico=tecnico.id AND sistema_integral.id=".$id); //Me sirve para obtener los nombres de empresa,granja,galpon y tecnico y utilizarlo en las variables granja, galpon.
        $empresa=Empresa::orderBy('nombre','asc')->lists('nombre','id'); 
        $granja=Granja::where('id_empresa','=',$datos[0]->id_empresa)->orderBy('nombre','asc')->lists('nombre','id'); 
        $galpon=Galpon::where('id_granja','=',$datos[0]->id_granja)->orderBy('codigo','asc')->lists('codigo','id'); 
        $sistema_integral=Sistema_Integral::find($id);
        $peso=DB::select("SELECT *FROM peso WHERE peso.id_sistema=".$id);
        $puntuacion=DB::select("SELECT puntuacion.id as id_puntuacion,puntuacion.nombre as nombre_puntuacion, detalle_puntuacion.id as id_detalle_puntuacion,detalle_puntuacion.nombre as nombre_detalle_puntuacion,detalle_puntuacion.estado FROM detalle_puntuacion,puntuacion WHERE detalle_puntuacion.id_puntuacion=puntuacion.id AND puntuacion.id_sistema=".$id." AND detalle_puntuacion.id_sistema=".$id);
        return view('SIM.edit',['sistema_integral' => $sistema_integral],compact('empresa','granja','galpon','datos','peso','puntuacion'));        
    }

    public function update($id, Request $request){
        try {
          DB::beginTransaction();  

            $SIM = Sistema_Integral::find($id);//ACUALIZO LAS IMAGENES
            $SIM->fill([ 
                'edad' => $request['edad'],                 
                'sexo' => $request['sexo'],                 
                'observaciones' => $request['observaciones'],                 
                'fecha' => $request['fecha'],                 
                'nro_pollos' => $request['nro_pollos'],                 
                'id_galpon' => $request['galpon'],                 
                'id_granja' => $request['granja'],                 
                'id_empresa' => $request['empresa'],                 
                'referencia' => $request['referencia'],                 
                'comentarios' => $request['comentarios'],
            ]);                                                
            $SIM->save();

            for ($i=1; $i <= 6; $i++) { 
            $peso = Peso::where('id_sistema',$id)//ACTUALIZO EN LA TABLA PESO
                    ->where('id',$i)
                    ->update([
                        'peso_corporal' => $request['peso_corporal_'.$i],                 
                        'peso_bursa' => $request['peso_bursa_'.$i],                 
                        'peso_brazo' => $request['peso_bazo_'.$i],                 
                        'peso_timo' => $request['peso_timo_'.$i],                 
                        'peso_higado' => $request['peso_higado_'.$i],                 
                        'indice_bursal' => $request['indice_bursal_'.$i],                 
                        'indice_timico' => $request['indice_timico_'.$i],                 
                        'indice_hepatico' => $request['indice_hepatico_'.$i],                 
                        'bursometro' => $request['bursometro_'.$i],                 
                        //'imei' => "0", 
                    ]);
            }

            //CARGAR PUNTUACION Y DETALLE_PUNDUACION
            $cont=1;
            for ($k=1; $k <= 19; $k++) { 
                for ($j=1; $j <= $request['cont_'.$k]; $j++) { 
                    DetallePuntuacion::where('id',$j)->where('id_puntuacion',$k)->where('id_sistema',$id)->update([ 'estado' => $request['valor_'.$cont] ]); //ACTUALIZO DETALLE PUNTUACION                                  
                    $cont++;
                }            
            }

              //CARGAR IMAGENES EN SISTEMA INTEGRAL
            $dir_imagen = "";
              for ($i=1; $i <= 5; $i++) {                 
                $ruta=DB::select("SELECT imagen".$i." as dir_imagen FROM sistema_integral WHERE sistema_integral.id=".$id);              
                if ($request['dir_imagen_'.$i] != "") { //SI ESTA CON UNA RUTA la FOTO INGRESA
                    if ($request['imagen_'.$i] != "") { //CAMBIO DE BASE 64    //echo $i." Cambio de base 64, ";   
                        $gestor = fopen($request['imagen_'.$i], "r");
                        $contenido = fread($gestor, filesize($request['imagen_'.$i]));
                        $contenido = base64_encode($contenido);
                        fclose($gestor);      
                        file_put_contents("invetsawebservice/".$ruta[0]->dir_imagen, $contenido);
                    }//else{ //echo $i." Ningun cambio, ";} 
                }else{
                    if ($request['imagen_'.$i] != "") {
                        if ($ruta[0]->dir_imagen != "") { //EXISTE RUTA PERO ES NUEVA SOLO LE CAMBIO EL BASE 64  //echo $i." Existe ruta pero es nueva, "; 
                            $gestor = fopen($request['imagen_'.$i], "r");
                            $contenido = fread($gestor, filesize($request['imagen_'.$i]));
                            $contenido = base64_encode($contenido);
                            fclose($gestor);      
                            file_put_contents("invetsawebservice/".$ruta[0]->dir_imagen, $contenido);                                                                                    
                        }else{//NO EXISTE RUTA PERO ES NUEVA POR COMPLETO   //echo $i." No existe ruta pero es nueva, "; 
                            $gestor = fopen($request['imagen_'.$i], "r");
                            $contenido = fread($gestor, filesize($request['imagen_'.$i]));
                            $contenido = base64_encode($contenido);
                            fclose($gestor);   
                            $dir_imagen = "sistema_integral_de_monitoreo/imagen/".$id."_imagen_".$i."_".$request['fecha'].".txt";
                            file_put_contents("invetsawebservice/".$dir_imagen, $contenido); 
                            echo $dir_imagen;                                                                                                        
                            $SIM = Sistema_Integral::find($id);//ACUALIZO LAS IMAGENES
                            $SIM->fill([ 'imagen'.$i => $dir_imagen ]);                                                
                            $SIM->save();     
                        }                                                                       
                    }else{
                        if ($ruta[0]->dir_imagen != "") { //EXISTE RUTA PERO NO CARGO IMAGEN POR LO TANTO SE ELIMINAT EL TXT Y SE BORRA LA RUTA  //echo $i." Existe ruta pero esta vacio, ";       
                            unlink("invetsawebservice/".$ruta[0]->dir_imagen);   //CODIGO PARA ELIMINAR UN TXT
                            $SIM = Sistema_Integral::find($id);//ACUALIZO LAS IMAGENES
                            $SIM->fill([ 'imagen'.$i => ""]);                                                
                            $SIM->save();
                        }//else{ //SI ESTA VACIO POR COMPLETO NO SE HACE NADA //echo $i." Vacio, ";  }                   
                    }                        
                }                 
              }
               
            DB::commit(); 
            return redirect('GuardarSIM/'.$id.'/edit')->with('message','ACTUALIZADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('GuardarSIM/'.$id.'/edit')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }         
    }

    public function show($id){
        $datos=DB::select("SELECT sistema_integral.*, empresa.nombre as empresa, granja.nombre as granja,granja.zona, galpon.codigo as galpon, tecnico.nombre as tecnico FROM sistema_integral,empresa,granja,galpon,tecnico WHERE sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND sistema_integral.id_galpon=galpon.id AND sistema_integral.id_tecnico=tecnico.id AND sistema_integral.id=".$id); //Me sirve para obtener los nombres de empresa,granja,galpon y tecnico y utilizarlo en las variables granja, galpon.
        $empresa=Empresa::orderBy('nombre','asc')->lists('nombre','id'); 
        $granja=Granja::where('id_empresa','=',$datos[0]->id_empresa)->orderBy('nombre','asc')->lists('nombre','id'); 
        $galpon=Galpon::where('id_granja','=',$datos[0]->id_granja)->orderBy('codigo','asc')->lists('codigo','id'); 
        $sistema_integral=Sistema_Integral::find($id);
        $peso=DB::select("SELECT *FROM peso WHERE peso.id_sistema=".$id);
        $puntuacion=DB::select("SELECT puntuacion.id as id_puntuacion,puntuacion.nombre as nombre_puntuacion, detalle_puntuacion.id as id_detalle_puntuacion,detalle_puntuacion.nombre as nombre_detalle_puntuacion,detalle_puntuacion.estado FROM detalle_puntuacion,puntuacion WHERE detalle_puntuacion.id_puntuacion=puntuacion.id AND puntuacion.id_sistema=".$id." AND detalle_puntuacion.id_sistema=".$id);
        return view('SIM.show',['sistema_integral' => $sistema_integral],compact('empresa','granja','galpon','datos','peso','puntuacion'));     
    }

    function BuscarEmpresa($idEmpresa){
        $empresa=DB::select("SELECT empresa.*,ciudad.nombre as ciudad FROM empresa,ciudad WHERE empresa.id_ciudad=ciudad.id AND empresa.id=".$idEmpresa);
        return response()->json($empresa);
    }



    public function SIM_PDF($id){ 
        $sistema_integral=DB::select("SELECT sistema_integral.*, empresa.nombre as empresa, granja.nombre as granja,granja.zona, galpon.codigo as galpon, tecnico.nombre as tecnico FROM sistema_integral,empresa,granja,galpon,tecnico WHERE sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND sistema_integral.id_galpon=galpon.id AND sistema_integral.id_tecnico=tecnico.id AND sistema_integral.id=".$id); //Me sirve para obtener los nombres de empresa,granja,galpon y tecnico y utilizarlo en las variables granja, galpon.

        $empresa=DB::select("SELECT *FROM empresa where empresa.id=".$sistema_integral[0]->id_empresa);
        $granja=DB::select("SELECT *FROM granja where granja.id=".$sistema_integral[0]->id_granja);
        $galpon=DB::select("SELECT *FROM galpon where galpon.id=".$sistema_integral[0]->id_galpon);
        $peso=DB::select("SELECT *FROM peso WHERE peso.id_sistema=".$id);
        $puntuacion=DB::select("SELECT puntuacion.id as id_puntuacion,puntuacion.nombre as nombre_puntuacion, detalle_puntuacion.id as id_detalle_puntuacion,detalle_puntuacion.nombre as nombre_detalle_puntuacion,detalle_puntuacion.estado FROM detalle_puntuacion,puntuacion WHERE detalle_puntuacion.id_puntuacion=puntuacion.id AND puntuacion.id_sistema=".$id." AND detalle_puntuacion.id_sistema=".$id);

        $pdf=\PDF::loadView('SIM.SIM_PDF',compact('sistema_integral','empresa','granja','galpon','peso','puntuacion'));
        return   $pdf->stream();
    }  
//['sistema_integral' => $sistema_integral],


    //ESTO ES UNA PRUEBA DEL SCROLL
    public function scroll(){
       return view("sistema_integral_monitoreo.scroll");
    }  
}
