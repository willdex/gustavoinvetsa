<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Http\Requests;
use App\Http\Requests\AdministradorRequest;
use App\Http\Requests\AdministradorUpdateRequest;
use Session;
use Redirect;
use DB;
use Hash;

class AdministradorController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
        $administrador = Usuario::where('privilegio','1')->paginate(10);
        return view('administrador.index', compact('administrador', $administrador));
    }
    public function create() {            
        return view('administrador.create');
    }

    public function store(AdministradorRequest $request) {
        Usuario::create([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'usuario' => $request['usuario'],
            'password' => Hash::make($request['password']),
            'privilegio' => 1,          
        ]);
        Session::flash('message', 'ADMINISTRADOR CREADO CORRECTAMENTE');
        return Redirect::to('/administrador');
    }


    public function edit($id) {
        $administrador = Usuario::find($id);
        return view('administrador.edit', ['administrador' => $administrador]);
    }

    public function update($id, AdministradorUpdateRequest $request) {
        if ($request['usuario'] == $request['usuario_aux']) {
            $user = Usuario::find($id);
            $user->fill([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'usuario' => $request->usuario,
            ]);
            $user->save();
            Session::flash('message', 'ADMINISTRADOR ACTUALIZADO CORRECTAMENTE.');
            return Redirect::to('/administrador');
        } else {
            $verificar=DB::select("SELECT count(*)as contador from usuario where usuario.usuario='".$request->usuario."'");
            if ($verificar[0]->contador == 0) {
                $user = Usuario::find($id);
                $user->fill([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'usuario' => $request->usuario,
                ]);
                $user->save();
                Session::flash('message', 'ADMINISTRADOR ACTUALIZADO CORRECTAMENTE.');
                return Redirect::to('/administrador');                
            } else {
                Session::flash('message-error', 'YA EXISTE ESE USUARIO "'.$request->usuario.'", ELIJA OTRO POR FAVOR.');
                return Redirect::to('/administrador/'.$id.'/edit');                
            }
        } 
    }

}
