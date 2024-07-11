<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

//cursos
// Route::get('/cursos',[CursosController::class, 'index'])->name('cursos');
// Route::get('/cursos/create', [CursosController::class, 'create'])->name('crear');
// Route::get("cursos/{curso}", [CursosController::class, 'show']);


// otra forma(grupos)
Route::controller(CursosController::class)->group(function(){
    Route::get('/cursos','index')->name('cursos');
    Route::get('/cursos/create','create')->name('cursos.crear');
    Route::get('/cursos/{curso}','show')->name('cursos.show');
});

####################### RUTA PARA PROCESAR FORMULARIO DE NUEVOS CURSOS###############################
Route::post('cursos', [CursosController::class, 'store'])->name('cursos.store');

####################### RUTA PARA ACCEDER A FORMULARIO DE ACTUALIZACION ###############################
Route::get('curso/{curso}/edit', [CursosController::class, 'edit'])->name('cursos.edit');
