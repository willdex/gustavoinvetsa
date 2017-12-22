<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GranjaRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Granja;
use DB;
use Hash;
use Auth;

class GranjaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    public function create(){;
        return view('granja.create');        
    }

    public function store(GranjaRequest $request){
        try {
          DB::beginTransaction();  
            Granja::create([
                'nombre' => $request['nombre'],                 
                'zona' => $request['zona'],                 
                'id_empresa' => $request['id_empresa'],                 
            ]);
            DB::commit(); 
            return redirect('empresa/'.Session::get('idEmpresa'))->with('message','GUARDADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('granja/create')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }            
    }

    public function edit($id){
        $granja=Granja::find($id);
        return view('granja.edit',compact('granja'));                
    }

    public function update($id, GranjaRequest $request){
        try {
          DB::beginTransaction();  
            $granja= Granja::find($id);
            $granja->fill($request->all());                    
            $granja->save(); 
            DB::commit(); 
            return redirect('empresa/'.Session::get('idEmpresa'))->with('message','ACTUALIZADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('granja/'.$id.'/edit')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }           
    }

    public function show($id){
        Session::put('idGranja',$id);
        $granja=DB::select("SELECT *from granja WHERE granja.id=".$id);
        $buscar_galpon=DB::select("SELECT *FROM galpon WHERE galpon.id_granja=".$id." ORDER BY galpon.codigo");
        $galpon=DB::table('galpon')
        ->join('granja','granja.id','=','galpon.id_granja')
        ->select('galpon.*')
        ->where('galpon.id_granja','=',$id)
        ->orderBy('galpon.codigo')
        ->paginate(15);  
        return view("granja.show", ["galpon"=>$galpon],compact('buscar_galpon','granja'));      
    }

    function BuscarGranjas($idGranja){
        $granja=DB::select("SELECT * FROM granja WHERE granja.id=".$idGranja);
        return response()->json($granja);
    }

}
