<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function index()
    {
        $roles = DB::table('rols')->get();
 
        return view('rols.index', ['roles' => $roles]);
    }
}
// public function index(){
//     $usuarios = Usuario::all();
//     return view('index')->with('usuarios',$usuarios); 
// }
