<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(){
        return view('content.cursos.index');
    }
    public function create(){
        return view('content.cursos.create');
    }

    public function show($curso){
        return view('content.cursos.show', compact('curso'));
    }
}
