<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;
use Session;
use Redirect;
use DB;

class LoginController extends Controller {

  
    function index() {
        $admin=DB::select("SELECT COUNT(*)contador FROM usuario"); 
        if ($admin[0]->contador > 0) {
            return view('log.index');                   
        } else {
            return Redirect::to('administrador');                                     
        }                  
    }
   
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
      $usuario= $request['usuario'];
        $password= $request['password'];
         $sesion=Auth::user();
        if (Auth::attempt(['usuario' =>$usuario, 'password' =>$password])) {
              if(Auth::user()->privilegio==1){
                return Redirect::to('sistema_integral_monitoreo');
              }
              else{
                return Redirect::to('sistema_integral_monitoreo');
              }
               
//            return response()->json(['messaje',$sesion]);
        }
//        $sesion=Auth::user();
//        Session::flash('message-error', 'Datos Incorrectos');
     Session::flash('message-error', 'DATOS INCORECCTO INTENTE NUEVAMENTE');
        return Redirect::to('/');
//        return response()->json(['messaje', $password]);
//        if($sesion!=null){
//          return response()->json(['messaje','no es null']);  
//        }
// else {return response()->json(['messaje','no es null']); }
//          $email= $request['email'];
//        $password= $request['password'];
//        if (Auth::loginUsingId(1)==false) {
////            return Redirect::to('galpon');
//            return response()->json(['messaje',Auth::loginUsingId(1)]);
//        }
      
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
