<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Empresa;
use App\Ciudad;
use DB;
use Hash;
use Auth;

class EmpresaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    public function index(){
        $buscar_empresa=DB::select("SELECT *from empresa order by empresa.nombre");
        //$empresa=Empresa::OrderBy('nombre')->paginate(20);
        $empresa=DB::table('empresa')
        ->join('ciudad','ciudad.id','=','empresa.id_ciudad')
        ->select('empresa.*','ciudad.nombre as ciudad')
        ->orderBy('empresa.nombre')
        ->where('ciudad.id_pais','=',1) // 1 ES EL ID DEL PAID BOLIVIA
        ->paginate(15);        
        return view('empresa.index',['empresa'=>$empresa],compact('buscar_empresa'));        
    }

    public function create(){
        $ciudad=Ciudad::where('id_pais','=',1)->lists('nombre','id'); // 1 ES EL ID DEL PAIS BOLIVIA
        return view('empresa.create',compact('ciudad'));        
    }

    public function store(EmpresaRequest $request){
        try {
          DB::beginTransaction();  
            Empresa::create([
                'nombre' => $request['nombre'],                 
                'direccion' => $request['direccion'],                 
                'id_ciudad' => $request['id_ciudad'],                 
            ]);
            DB::commit(); 
            return redirect('empresa')->with('message','GUARDADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('empresa/create')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }                
    }

    public function edit($id){
        $ciudad=Ciudad::where('id_pais','=',1)->lists('nombre','id'); // 1 ES EL ID DEL PAIS BOLIVIA
        $empresa=Empresa::find($id);
        return view('empresa.edit',compact('ciudad','empresa'));        
    }

    public function update($id, EmpresaRequest $request){
        try {
          DB::beginTransaction();  
            $empresa= Empresa::find($id);
            $empresa->fill($request->all());                    
            $empresa->save();         
            DB::commit(); 
            return redirect('empresa')->with('message','ACTUALIZADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('empresa/'.$id.'/edit')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }         
    }

    public function show($id){
        Session::put('idEmpresa',$id);
        $empresa=DB::select("SELECT *from empresa WHERE empresa.id=".$id);
        $buscar_granja=DB::select("SELECT *FROM empresa,granja WHERE empresa.id=granja.id_empresa AND granja.id_empresa=".$id." ORDER BY granja.nombre");
        $granja=DB::table('granja')
        ->join('empresa','empresa.id','=','granja.id_empresa')
        ->select('empresa.id as id_empresa', 'empresa.nombre as nombre_empresa', 'granja.id as id_granja', 'granja.nombre as nombre_granja','granja.zona')
        ->where('granja.id_empresa','=',$id)
        ->orderBy('granja.nombre')
        ->paginate(15);  
        return view("empresa.show", ["granja"=>$granja],compact('buscar_granja','empresa'));      
    }

    function BuscarEmpresa($idEmpresa){
        $empresa=DB::select("SELECT empresa.*,ciudad.nombre as ciudad FROM empresa,ciudad WHERE empresa.id_ciudad=ciudad.id AND empresa.id=".$idEmpresa);
        return response()->json($empresa);
    }


    //ESTO ES UNA PRUEBA DEL SCROLL
    public function scroll(){
       return view("sistema_integral_monitoreo.scroll");
    }  
}
