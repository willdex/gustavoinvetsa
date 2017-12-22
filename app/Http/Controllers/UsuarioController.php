<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuario;
use App\Http\Requests;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Hash;
use Auth;

class UsuarioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
        if (Auth::user()->privilegio == 1) {      
            $buscar_usuario=DB::select("SELECT *from usuario where usuario.estado=1 and usuario.privilegio=0");
            $usuario = Usuario::where('privilegio','0')->paginate(15);
            return view('usuario.index',['usuario'=>$usuario], compact('buscar_usuario',$buscar_usuario));            
        } else {
            return view('errors.404'); 
        }            
    }

    public function create() { 
        if (Auth::user()->privilegio == 1) {      
            $universidad = DB::select("SELECT *from universidad where universidad.estado=1 order by Universidad.nombre");
            return view('usuario.create',compact('universidad',$universidad));          
        } else {
            return view('errors.404'); 
        }          
    }

    public function store(UsuarioRequest $request) {
        Usuario::create([
            'nombre' => $request['nombre'],          
            'apellido' => $request['apellido'],          
            'id_universidad' => $request['id_universidad'],          
            'telefono' => $request['telefono'],          
            'correo' => $request['correo'],          
            'usuario' => $request['usuario'],          
            'password' => Hash::make($request['password']),
            'privilegio' => 0,         
        ]);
        Session::flash('message', 'CREADO CORRECTAMENTE');
        return Redirect::to('/usuario');
    }

    public function edit($id) {
        if (Auth::user()->privilegio == 1) {      
            $usuario = Usuario::find($id);
            return view('usuario.edit', ['usuario' => $usuario]);         
        } else {
            return view('errors.404'); 
        }         
    }

    public function update($id, UsuarioRequest $request) {
        $uni = Usuario::find($id);
        $uni->fill($request->all());
        //$uni->fill([ 'nombre' => $request->nombre, ]);
        $uni->save();
        Session::flash('message', 'ACTUALIZADO CORRECTAMENTE.');
        return Redirect::to('/usuario');

    }

}
