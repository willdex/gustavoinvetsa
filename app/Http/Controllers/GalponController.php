<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GalponRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Galpon;
use DB;
use Hash;
use Auth;

class GalponController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    public function create(){;
        return view('galpon.create');        
    }

    public function store(GalponRequest $request){
        try {
          DB::beginTransaction();  
            Galpon::create([
                'codigo' => $request['codigo'],                 
                'cantidad_pollo' => $request['cantidad_pollo'],                 
                'id_granja' => $request['id_granja'],                 
                'id_empresa' => $request['id_empresa'],                 
            ]);
            DB::commit(); 
            return redirect('granja/'.Session::get('idGranja'))->with('message','GUARDADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('galpon/create')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }            
    }

    public function edit($id){
        $galpon=Galpon::find($id);
        return view('galpon.edit',compact('galpon'));                
    }

    public function update($id, GalponRequest $request){
        try {
          DB::beginTransaction();  
            $galpon = Galpon::find($id);
            $galpon->fill($request->all());                    
            $galpon->save(); 
            DB::commit(); 
            return redirect('granja/'.Session::get('idGranja'))->with('message','ACTUALIZADO CORRECTAMENTE');  
        }catch (Exception $e) {
            DB::rollback();
            return redirect('galpon/'.$id.'/edit')->with("message-error","ERROR INTENTE NUEVAMENTE");      
        }           
    }

    function BuscarGalpon($idGalpon){
        $galpon=DB::select("SELECT * FROM galpon WHERE galpon.id=".$idGalpon);
        return response()->json($galpon);
    }


}
