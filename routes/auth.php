<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    //TELA DE CADASTRO DE CONTA
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    //REGISTRAR NOVO USUÁRIO
    Route::post('register', [RegisteredUserController::class, 'store']);

    //TELA DE LOGIN
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    //EFETUAR LOGIN
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    //AUTH API
    Route::get('social/auth/{driver}', [SocialiteController::class, 'redirecToProvider'])->name('social.login');
    Route::get('login/{driver}/callback', [SocialiteController::class, 'handleProviderCallback']);

    //ROTAS PARA GERENCIAMENTO DE UPDATE DE SENHA
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');

});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
