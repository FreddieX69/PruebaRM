<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $email =$request->email;
        $contrasenia = $request->contrasenia;
        $usuario = Usuario::where('email',$email)->where('contrasenia',$contrasenia)->first();

        if ($usuario) {
            return redirect('usuarios');
        } else {
            return back()->with('status','Datos Invalidos');
        }
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
    }
}
