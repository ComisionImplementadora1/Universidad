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
use Illuminate\Support\Facades\Route;

Route::prefix('alumno')->name('alumno.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:alumno');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:alumno')
        ->name('dashboard');

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:alumno')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:alumno');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:alumno')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:alumno');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:alumno')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:alumno')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:alumno')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:alumno')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:alumno')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:alumno', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:alumno', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:alumno')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:alumno');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:alumno')
        ->name('logout');
});
