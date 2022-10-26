<?php

use App\Http\Controllers\Administrador\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrador\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrador\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrador\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrador\Auth\NewPasswordController;
use App\Http\Controllers\Administrador\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrador\Auth\RegisteredUserController;
use App\Http\Controllers\Administrador\Auth\VerifyEmailController;
use App\Http\Controllers\Administrador\DashboardController;
use App\Http\Controllers\comisionesController;
use Illuminate\Support\Facades\Route;

Route::prefix('administrador')->name('administrador.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:administrador');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:administrador')
        ->name('dashboard');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:administrador')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:administrador');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:administrador')
        ->name('logout');

    Route::resource('materias', 'App\Http\Controllers\materiasController')
        ->middleware('auth:administrador');
    
    Route::resource('carreras', 'App\Http\Controllers\carrerasController')
        ->middleware('auth:administrador');
    
    Route::resource('departamentos', 'App\Http\Controllers\departamentosController')
        ->middleware('auth:administrador');
    
    Route::resource('alumnos', 'App\Http\Controllers\alumnosController')
        ->middleware('auth:administrador');
    
    Route::resource('docentes', 'App\Http\Controllers\docentesController')
        ->middleware('auth:administrador');

    Route::resource('comisiones', 'App\Http\Controllers\comisionesController')
        ->middleware('auth:administrador');

    Route::get('/comisiones/{id}/profesor', [comisionesController::class, 'showProfesor'])
        ->middleware('auth:administrador');
    
    Route::put('/comisiones/{id}/profesor', [comisionesController::class, 'storeProfesor'])
        ->middleware('auth:administrador');
    
    Route::delete('/comisiones/{id}/profesor', [comisionesController::class, 'deleteProfesor'])
        ->middleware('auth:administrador');

    Route::get('/comisiones/{id}/materia', [comisionesController::class, 'showMateria'])
        ->middleware('auth:administrador');
    
    Route::put('/comisiones/{id}/materia', [comisionesController::class, 'storeMateria'])
        ->middleware('auth:administrador');
    
    Route::delete('/comisiones/{id}/materia', [comisionesController::class, 'deleteMateria'])
        ->middleware('auth:administrador');
    
    Route::get('/comisiones/{id}/asistente', [comisionesController::class, 'showAsistente'])
        ->middleware('auth:administrador');
    
    Route::put('/comisiones/{id}/asistente', [comisionesController::class, 'storeAsistente'])
        ->middleware('auth:administrador');
    
    Route::delete('/comisiones/{id}/asistente', [comisionesController::class, 'deleteAsistente'])
        ->middleware('auth:administrador');

    Route::get('/comisiones/{id}/ayudantes', [comisionesController::class, 'showAyudantes'])
        ->middleware('auth:administrador');

    Route::get('/comisiones/{id}/ayudantes/create', [comisionesController::class, 'createAyudante'])
        ->middleware('auth:administrador');
    
    Route::post('/comisiones/{id}/ayudantes/create', [comisionesController::class, 'storeAyudante'])
        ->middleware('auth:administrador');

    Route::delete('/comisiones/{id}/ayudantes', [comisionesController::class, 'deleteAyudante'])
        ->middleware('auth:administrador');

});
