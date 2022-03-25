<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('home');

Route::resource('usuarios', UsuarioController::class);

Route::post('estado', [EstadoController::class, 'index'])->name('estado')->middleware('rol:administrador,operador');

Route::get('user/create', function () { return view('usuarios.createUser');})->name('create');

Route::get('user/show', [UsuarioController::class, 'showUser'] )->name('show')->middleware('rol:solicitante');



//RUTAS PARA LOGIN
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');





