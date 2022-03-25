<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(Request $Request){

    return view('dash',['title'=>$Request->query('title', 'valor por defecto')]); 
    }

};