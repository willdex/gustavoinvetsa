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

class PDFController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }


    public function Vacunacion_PI_PDF(){ 
        /*$sistema_integral=DB::select("SELECT sistema_integral.*, empresa.nombre as empresa, granja.nombre as granja,granja.zona, galpon.codigo as galpon, tecnico.nombre as tecnico FROM sistema_integral,empresa,granja,galpon,tecnico WHERE sistema_integral.id_empresa=empresa.id AND sistema_integral.id_granja=granja.id AND sistema_integral.id_galpon=galpon.id AND sistema_integral.id_tecnico=tecnico.id AND sistema_integral.id=".$id); //Me sirve para obtener los nombres de empresa,granja,galpon y tecnico y utilizarlo en las variables granja, galpon.

        $empresa=DB::select("SELECT *FROM empresa where empresa.id=".$sistema_integral[0]->id_empresa);
        $granja=DB::select("SELECT *FROM granja where granja.id=".$sistema_integral[0]->id_granja);
        $galpon=DB::select("SELECT *FROM galpon where galpon.id=".$sistema_integral[0]->id_galpon);
        $peso=DB::select("SELECT *FROM peso WHERE peso.id_sistema=".$id);
        $puntuacion=DB::select("SELECT puntuacion.id as id_puntuacion,puntuacion.nombre as nombre_puntuacion, detalle_puntuacion.id as id_detalle_puntuacion,detalle_puntuacion.nombre as nombre_detalle_puntuacion,detalle_puntuacion.estado FROM detalle_puntuacion,puntuacion WHERE detalle_puntuacion.id_puntuacion=puntuacion.id AND puntuacion.id_sistema=".$id." AND detalle_puntuacion.id_sistema=".$id);
*/
        $pdf=\PDF::loadView('vacunacion_pi.vacunacion_pi_pdf');
        return   $pdf->stream();
    }  

    public function MantenimientoSpravac_PDF($id){ 
        $pdf=\PDF::loadView('MantenimientoSpravac_PDF.MantenimientoSpravac_PDF');
        return   $pdf->stream();
    }  

}
