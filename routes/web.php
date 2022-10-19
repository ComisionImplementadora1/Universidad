<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::resource('materias', 'App\Http\Controllers\materiasController')->middleware(['auth:administrador', 'auth:alumno']);
Route::resource('carreras', 'App\Http\Controllers\carrerasController')->middleware(['auth:administrador', 'auth:alumno']);
Route::resource('departamentos', 'App\Http\Controllers\departamentosController')->middleware(['auth:administrador', 'auth:alumno']);
Route::resource('alumnos', 'App\Http\Controllers\alumnosController')->middleware(['auth:administrador']);
Route::resource('docentes', 'App\Http\Controllers\docentesController')->middleware(['auth:administrador']);

require __DIR__.'/auth.php';
require __DIR__.'/alumno.php';require __DIR__.'/docente.php';require __DIR__.'/administrador.php';