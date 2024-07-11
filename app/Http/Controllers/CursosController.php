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
        //return $request->all(); //this method gets all fields of the form
        //before create instance and save the records we make sure that all inputs are complete
        $request->validate([
            'course_name' => 'required',
            'description' => 'required',   ####this validation isn't bad, but prefer to do it with js :)
            'category' => 'required'
        ]);

        $curso = new Curso();
        // $curso->name = $request->course_name;
        
        $curso->name = filter_var($request->course_name, FILTER_SANITIZE_STRING); //ITS DEPRECATED
        $curso->description = $request->description;
        $curso->categoria = $request->category;

        $curso->save(); //para que se guarden los cambios

        ############ ASIGNACION MASIVA ###############
        //to be able to use mass assignment it's neccessary follow the naming conventions
        //$curso = Curso::create($request->all()); //we can use this method only to add masive records to db 



        return redirect()->route('cursos'); //de esta manera podemos retornar al la pagina que queramos desde el conttrolador
    }

    //editar
    public function edit(Curso $curso){
        //return $curso;

        return view('content.cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso){ //alway we update a record of db we'll use this variables and classes
        $curso->name = filter_var($request->course_name, FILTER_SANITIZE_STRING);
        $curso->description = $request->description;
        $curso->categoria = $request->category;

        $curso->save();
        return redirect()->route('cursos.show', $curso);
    }
}
