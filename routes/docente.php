<?php

use App\Http\Controllers\Docente\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Docente\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Docente\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Docente\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Docente\Auth\NewPasswordController;
use App\Http\Controllers\Docente\Auth\PasswordResetLinkController;
use App\Http\Controllers\Docente\Auth\RegisteredUserController;
use App\Http\Controllers\Docente\Auth\VerifyEmailController;
use App\Http\Controllers\Docente\DashboardController;
use App\Http\Controllers\comisionesController;
use Illuminate\Support\Facades\Route;

Route::prefix('docente')->name('docente.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:docente');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:docente')
        ->name('dashboard');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:docente')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:docente');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:docente')
        ->name('logout');

    Route::resource('materias', 'App\Http\Controllers\materiasController')
        ->middleware('auth:docente');
    
    Route::resource('carreras', 'App\Http\Controllers\carrerasController')
        ->middleware('auth:docente');
    
    Route::resource('departamentos', 'App\Http\Controllers\departamentosController')
        ->middleware('auth:docente');

    Route::get('comisiones', [comisionesController::class, 'indexDocente'])
        ->middleware('auth:docente');
    
    Route::get('/comisiones/{id}/materia', [comisionesController::class, 'showMateria'])
        ->middleware('auth:docente');

    Route::get('/comisiones/{id}/inscriptos', [comisionesController::class, 'showInscriptos'])
        ->middleware('auth:docente');

    Route::put('/comisiones/{id}/inscriptos/{id_inscripto}', [comisionesController::class, 'updateInscripto'])
        ->middleware('auth:docente');

    Route::get('/comisiones/{id}/inscriptos/{id_inscripto}', [comisionesController::class, 'editInscripto'])
        ->middleware('auth:docente');

});
