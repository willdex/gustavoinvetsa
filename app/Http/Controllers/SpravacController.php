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

class SpravacController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }


    public function index(){
        $spravac=DB::table('servicio_mantenimiento')
        ->join('compania','compania.id','=','servicio_mantenimiento.id_compania')
        ->join('maquina','maquina.id','=','servicio_mantenimiento.id_maquina')
        ->join('tecnico','tecnico.id','=','servicio_mantenimiento.id_tecnico')
        ->select('servicio_mantenimiento.*','compania.nombre as compania', 'compania.direccion as direccion_compania','maquina.codigo as codigo_maquina', 'tecnico.codigo as codigo_tecnico', 'tecnico.nombre as tecnico')
        ->where('servicio_mantenimiento.formulario','SPRAVAC')
        ->orderBy('servicio_mantenimiento.fecha','desc')
        //->take(15)->get();
        ->paginate(10);
        return view('spravac.index',['spravac'=>$spravac]);
    }  

    function Buscar_Spravac($fecha_inicio, $fecha_fin){
        $spravac=DB::select("SELECT servicio_mantenimiento.*, compania.nombre as compania, compania.direccion as direccion_compania,maquina.codigo as codigo_maquina, tecnico.codigo as codigo_tecnico, tecnico.nombre as tecnico FROM servicio_mantenimiento,compania,maquina,tecnico WHERE servicio_mantenimiento.id_compania=compania.id AND servicio_mantenimiento.id_maquina=maquina.id AND servicio_mantenimiento.id_tecnico=tecnico.id AND servicio_mantenimiento.fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' AND servicio_mantenimiento.formulario='SPRAVAC' ORDER BY servicio_mantenimiento.fecha DESC");
        return response()->json($spravac);
    }


    public function MantenimientoSpravac_PDF($id){ 
        $zootec=DB::table('servicio_mantenimiento')
        ->join('compania','compania.id','=','servicio_mantenimiento.id_compania')
        ->join('maquina','maquina.id','=','servicio_mantenimiento.id_maquina')
        ->join('tecnico','tecnico.id','=','servicio_mantenimiento.id_tecnico')
        ->select('servicio_mantenimiento.*','compania.nombre as compania', 'compania.direccion as direccion_compania','maquina.codigo as codigo_maquina', 'tecnico.codigo as codigo_tecnico', 'tecnico.nombre as tecnico')
        ->where('servicio_mantenimiento.formulario','SPRAVAC')
        ->where('servicio_mantenimiento.id',$id)
        ->orderBy('servicio_mantenimiento.fecha','desc')
        ->get();   
        $det_insp_visual=DB::select("SELECT *FROM detalle_inspeccion_visual where id_servicio=".$id." ORDER BY id ASC");  
        $insp_visual=DB::table('inspeccion_visual')->select('inspeccion_visual.*')->where('inspeccion_visual.id_servicio',$id)->get();  

        $det_insp_funcional_1=DB::table('detalle_inspeccion_funcionamiento')->select('*')->where('detalle_inspeccion_funcionamiento.id_servicio',$id)->where('detalle_inspeccion_funcionamiento.id_inspeccion',1)->orderBy('detalle_inspeccion_funcionamiento.id','ASC')->get();  
        $det_insp_funcional_2=DB::table('detalle_inspeccion_funcionamiento')->select('*')->where('detalle_inspeccion_funcionamiento.id_servicio',$id)->where('detalle_inspeccion_funcionamiento.id_inspeccion',2)->orderBy('detalle_inspeccion_funcionamiento.id','ASC')->get();      
        $inspeccion_funcionamiento=DB::table('inspeccion_funcionamiento')->select('*')->where('inspeccion_funcionamiento.id_servicio',$id)->orderBy('inspeccion_funcionamiento.id','ASC')->get();    

        $pdf=\PDF::loadView('spravac.MantenimientoSpravac_PDF',compact('zootec','det_insp_visual','insp_visual','det_insp_funcional_1','det_insp_funcional_2','inspeccion_funcionamiento'));
        return   $pdf->stream();
    }  

}
