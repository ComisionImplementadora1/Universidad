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
use Illuminate\Support\Facades\Route;

Route::prefix('docente')->name('docente.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:docente');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:docente')
        ->name('dashboard');

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:docente')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:docente');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:docente')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:docente');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:docente')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:docente')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:docente')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:docente')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:docente')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:docente', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:docente', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:docente')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:docente');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:docente')
        ->name('logout');
});
