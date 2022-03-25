<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Estado;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('rol:administrador,operador', ['only' => ['index', 'show']]);
        $this->middleware('rol:administrador', ['only' => ['create','edit', 'update', 'destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $usuarios = Usuario::with('rol','estado')->get();
        return view('usuarios.index')->with('usuarios',$usuarios); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $password = substr(md5(rand()),0,8);
        $estado = 3;
        $usuario = Usuario::create(['estado_id' =>$estado,'contrasenia' => $password ]+ $request->all());
        $usuario->foto=$request->file('foto')->store('fotos','public');

        $subject = "Contraseña Registro";
        $for = $usuario->email;
        
        Mail::send('mails.contrasenia',$usuario->toArray(), function($msj) use($subject,$for){
            $msj->subject($subject);
            $msj->to($for);
        });
        $usuario->contrasenia = Hash::make($password);
        $usuario->save();
        return back()->with('status','Registro Creado Correctamente, su contraseña de inicio de sesión se ha enviado a su correo electrónico');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.show')->with('usuario',$usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.edit')->with('usuario',$usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        // $validated = $request->validate([
        //     'email' => 'required|unique:usuarios|exclude_if:,email,$usuario->email'
        // ]);

        $usuario = Usuario::find($id);

        if ($request->file('foto')){
            $usuario->foto = $request->file('foto')->store('fotos','public');
        }
        $usuario->primer_nombre = $request->primer_nombre;
        $usuario->segundo_nombre= $request->segundo_nombre;
        $usuario->tercer_nombre= $request->tercer_nombre;
        $usuario->primer_apellido= $request->primer_apellido;
        $usuario->segundo_apellido= $request->segundo_apellido;
        $usuario->apellido_casada= $request->apellido_casada;
        $usuario->fecha_nacimiento= $request->fecha_nacimiento;
        $usuario->num_dpi= $request->num_dpi;
        $usuario->profesion= $request->profesion;
        $usuario->anios_laborando= $request->anios_laborando;
        $usuario->salario= $request->salario;
        $usuario->email = $request->email;
        $usuario->rol_id = $request->rol_id;
        $usuario->save();
        return back()->with('status','Registro Atualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return back()->with('status','Registro Eliminado Correctamente');
    }

    public function showUser(Request $request)
    {
        $email = $request->session()->get('email');
        $usuario = Usuario::where('email', $email)->first();
        return view('usuarios.showUser')->with('usuario',$usuario);
    }

}
