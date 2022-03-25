<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;

use function GuzzleHttp\Promise\all;

class LoginController extends Controller
{
    public function index(){
        return view('login'); 
    }

    public function login(Request $request)
    {     
        $email = $request->email;
        $usuario = Usuario::where('email',$email)->first();
        if ($usuario) {
            $pasword = Hash::check($request->contrasenia, $usuario->contrasenia);
            if ($pasword) {
                $request->session()->put('email', $email);
                if ($usuario->rol_id == 3){
                    return redirect()->route('show');
                } else {
                    return redirect()->route('usuarios.index');
                }
            } else {
                return back()->with('status','Conrtaseña Incorrecta');
            }
        } else {
            return back()->with('status','El correo ingresado no es válido');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}

