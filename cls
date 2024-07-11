warning: in the working copy of 'public/css/forms.css', CRLF will be replaced by LF the next time Git touches it
warning: in the working copy of 'resources/views/content/cursos/create.blade.php', CRLF will be replaced by LF the next time Git touches it
[1mdiff --git a/app/Http/Controllers/CursosController.php b/app/Http/Controllers/CursosController.php[m
[1mindex d0bf0bf..6abe2f9 100644[m
[1m--- a/app/Http/Controllers/CursosController.php[m
[1m+++ b/app/Http/Controllers/CursosController.php[m
[36m@@ -8,7 +8,6 @@[m
 class CursosController extends Controller[m
 {[m
     public function index(){[m
[31m-[m
         $cursos = Curso::all(); //a la hora de listar es mejor hacerlo con paginate que con all si es que son muchisimos registros los que se van a mostrar[m
         $cursos1 = Curso::orderby('id', 'desc')->paginate();[m
         return view('content.cursos.index', compact('cursos1'));[m
[36m@@ -16,16 +15,23 @@[m [mpublic function index(){[m
     public function create(){[m
         return view('content.cursos.create');[m
     }[m
[31m-[m
     public function show(Curso $curso){[m
         return view('content.cursos.show', compact('curso'));[m
     }[m
     //registrar[m
     public function store(Request $request){[m
         //return $request->all();[m
[31m-        $curso = new Curso();[m
[32m+[m[32m        //before create instance and save the records we make sure that all inputs are complete[m
[32m+[m[32m        $request->validate([[m
[32m+[m[32m            'course_name' => 'required',[m
[32m+[m[32m            'description' => 'required',   ####this validation isn't bad, but prefer to do it with js :)[m
[32m+[m[32m            'category' => 'required'[m
[32m+[m[32m        ]);[m
 [m
[31m-        $curso->name = $request->course_name;[m
[32m+[m[32m        $curso = new Curso();[m
[32m+[m[32m        // $curso->name = $request->course_name;[m
[32m+[m[41m        [m
[32m+[m[32m        $curso->name = filter_var($request->course_name, FILTER_SANITIZE_STRING); //ITS DEPRECATED[m
         $curso->description = $request->description;[m
         $curso->categoria = $request->category;[m
 [m
[36m@@ -35,6 +41,17 @@[m [mpublic function store(Request $request){[m
 [m
     //editar[m
     public function edit(Curso $curso){[m
[31m-        return $curso;[m
[32m+[m[32m        //return $curso;[m
[32m+[m
[32m+[m[32m        return view('content.cursos.edit', compact('curso'));[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function update(Request $request, Curso $curso){ //alway we update a record of db we'll use this variables and classes[m
[32m+[m[32m        $curso->name = filter_var($request->course_name, FILTER_SANITIZE_STRING);[m
[32m+[m[32m        $curso->description = $request->description;[m
[32m+[m[32m        $curso->categoria = $request->category;[m
[32m+[m
[32m+[m[32m        $curso->save();[m
[32m+[m[32m        return redirect()->route('cursos.show', $curso);[m
     }[m
 }[m
[1mdiff --git a/public/css/forms.css b/public/css/forms.css[m
[1mindex a1f413d..3abfead 100644[m
[1m--- a/public/css/forms.css[m
[1m+++ b/public/css/forms.css[m
[36m@@ -109,4 +109,10 @@[m [m.clean{[m
 }[m
 .clean:hover{[m
     box-shadow: rgba(39, 128, 245, 0.384) 12px 14px 20px;;[m
[32m+[m[32m}[m
[32m+[m[32m.edit_form{[m
[32m+[m[32m    background-image: url(../img/malte-schmidt-enGr5YbjQKQ-unsplash.jpg);[m
[32m+[m[32m}[m
[32m+[m[32m.edit_form .input_box span{[m
[32m+[m[32m    color: white;[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/resources/views/content/cursos/create.blade.php b/resources/views/content/cursos/create.blade.php[m
[1mindex ac4a7b2..a0bb723 100644[m
[1m--- a/resources/views/content/cursos/create.blade.php[m
[1m+++ b/resources/views/content/cursos/create.blade.php[m
[36m@@ -19,6 +19,9 @@[m
                         <input type="text" name="course_name" required class="input_file">[m
                         <span>Nombre del curso</span>[m
                         <i></i>[m
[32m+[m[32m                        @error('name')[m
[32m+[m[32m                            <span>{{$message}}</span>[m
[32m+[m[32m                        @enderror[m
                     </div>[m
     [m
                     <div class="input_box">[m
[36m@@ -38,7 +41,9 @@[m
                 <div class="container_buttons">[m
                     <input type="submit" value="Enviar" class="btn my-3">[m
 [m
[31m-                    <button class="btn my-3 clean">Limpiar</button>[m
[32m+[m[32m                    <a href="{{(route('cursos'))}}">[m
[32m+[m[32m                        <button class="btn my-3 clean">Cancelar</button>[m
[32m+[m[32m                    </a>[m
                 </div>[m
                [m
                 [m
[1mdiff --git a/routes/web.php b/routes/web.php[m
[1mindex 8127f08..46eac5e 100644[m
[1m--- a/routes/web.php[m
[1m+++ b/routes/web.php[m
[36m@@ -34,4 +34,8 @@[m
 Route::post('cursos', [CursosController::class, 'store'])->name('cursos.store');[m
 [m
 ####################### RUTA PARA ACCEDER A FORMULARIO DE ACTUALIZACION ###############################[m
[31m-Route::get('curso/{curso}/edit', [CursosController::class, 'edit'])->name('cursos.edit');[m
[32m+[m[32mRoute::get('curso/{curso}/edit', [CursosController::class, 'edit'])->name('cursos.edit'); //el metedo edit nos sirve para llamar al formulario de actualizacion[m
[32m+[m
[32m+[m
[32m+[m[32m####################### RUTA PARA ACTUALIZAR EL REGISTRO ###############################[m
[32m+[m[32mRoute::put('cursos/{curso}', [CursosController::class, 'update'])->name('cursos.update'); //el metodo update comunmente se utiliza para actualizar los registros de la base[m
\ No newline at end of file[m
