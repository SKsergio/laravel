<?php

namespace App\Http\Controllers;
use App\Models\Curso;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(){

        $cursos = Curso::all(); //a la hora de listar es mejor hacerlo con paginate que con all si es que son muchisimos registros los que se van a mostrar
        $cursos1 = Curso::orderby('id', 'desc')->paginate();
        return view('content.cursos.index', compact('cursos1'));
    }
    public function create(){
        return view('content.cursos.create');
    }

    public function show(Curso $curso){
        return view('content.cursos.show', compact('curso'));
    }
    //registrar
    public function store(Request $request){
        //return $request->all();
        $curso = new Curso();

        $curso->name = $request->course_name;
        $curso->description = $request->description;
        $curso->categoria = $request->category;

        $curso->save(); //para que se guarden los cambios
        return redirect()->route('cursos'); //de esta manera podemos retornar al la pagina que queramos desde el conttrolador
    }

    //editar
    public function edit(Curso $curso){
        return $curso;
    }
}
