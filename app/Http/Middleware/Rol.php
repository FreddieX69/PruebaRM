<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use Closure;
use Illuminate\Http\Request;

class Rol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        $email = $request->session()->get('email');
        if ($email) {
            $usuario = Usuario::where('email', $email)->first();
        } else {
            return redirect()->route('home');
        }

        foreach($roles as $rol) {
            if($rol == $usuario->rol->nombre_rol)  {
                return $next($request);
            } 
        }
        
        return redirect()->route('home');   
    }
}
