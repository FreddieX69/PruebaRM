<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EstadoController extends Controller
{
    public function index(Request $request)
    {

        $usuario = Usuario::with('estado')->find($request->id);

        $usuario->estado_id = $request->estado_id;
        
        $usuario->save();
        //$usuario->status = $usuario->estado;
        //ENVIAR CORREO AL ACTUALIZAR

        $subject = "Se ha actualizado el estado de registro";
        $for = $usuario->email;
        $usuario->save();
        Mail::send('mails.estado',$usuario->toArray(), function($msj) use($subject,$for){
            $msj->subject($subject);
            $msj->to($for);
        });
        return back()->with('status','Estado Actualizado Correctamente');
    }


}
