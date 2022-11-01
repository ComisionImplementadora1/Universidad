<?php

use App\Http\Controllers\Alumno\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Alumno\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Alumno\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Alumno\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Alumno\Auth\NewPasswordController;
use App\Http\Controllers\Alumno\Auth\PasswordResetLinkController;
use App\Http\Controllers\Alumno\Auth\RegisteredUserController;
use App\Http\Controllers\Alumno\Auth\VerifyEmailController;
use App\Http\Controllers\Alumno\DashboardController;
use App\Http\Controllers\alumnosController;
use Illuminate\Support\Facades\Route;

Route::prefix('alumno')->name('alumno.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:alumno');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:alumno')
        ->name('dashboard');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:alumno')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:alumno');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:alumno')
        ->name('logout');
    
    Route::resource('materias', 'App\Http\Controllers\materiasController')
        ->middleware('auth:alumno');
    
    Route::resource('carreras', 'App\Http\Controllers\carrerasController')
        ->middleware('auth:alumno');
    
    Route::resource('departamentos', 'App\Http\Controllers\departamentosController')
        ->middleware('auth:alumno');

    Route::get('/inscripcion-carrera/{id_carrera}', [alumnosController::class, 'inscripcion_carrera'])
        ->middleware('auth:alumno');

    Route::get('/control-correlativas/{id_materia}', [alumnosController::class, 'control_correlativas'])
        ->middleware('auth:alumno');

    Route::get('/control-correlativas/inscripcion-comision/{id_materia}', [alumnosController::class, 'inscripcion_comision'])
        ->middleware('auth:alumno');
});
