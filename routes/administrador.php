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
use Illuminate\Support\Facades\Route;

Route::prefix('administrador')->name('administrador.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:administrador');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:administrador')
        ->name('dashboard');

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:administrador')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:administrador');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:administrador')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:administrador');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:administrador')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:administrador')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:administrador')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:administrador')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:administrador')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:administrador', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:administrador', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:administrador')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:administrador');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:administrador')
        ->name('logout');
});
