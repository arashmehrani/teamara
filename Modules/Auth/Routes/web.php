<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\LoginController;
use Modules\Auth\Http\Controllers\RegisterController;
use Modules\Auth\Http\Controllers\PasswordController;
use Modules\Auth\Http\Controllers\EmailController;

Route::middleware(['connection'])->group(function () {

// Auth Main Routes
    Route::get('/login', [\Modules\Auth\Http\Controllers\AuthController::class, 'loginView'])
        ->middleware('guest')->name('login')->middleware(['guest', 'throttle:10,1']);
    Route::get('/register', [AuthController::class, 'registerView'])
        ->middleware('guest')->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])
        ->middleware('auth')->name('logout');

// Auth post requests
    Route::post('/login', [LoginController::class, 'login'])->middleware(['guest', 'throttle:6,1']);
    Route::post('/register', [registerController::class, 'register'])->middleware(['guest', 'throttle:6,1']);

// Auth emails verification Routes
    Route::get('/email/verify', [EmailController::class, 'verifyNotice'])
        ->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verifyRequest'])
        ->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailController::class, 'resendVerification'])
        ->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Auth password reset Routes
    Route::get('/forgot-password', [PasswordController::class, 'passwordRequest'])
        ->middleware('guest')->name('password.request');
    Route::post('/forgot-password', [PasswordController::class, 'sendPasswordRequest'])
        ->middleware(['guest', 'throttle:6,1'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordController::class, 'resetPassword'])
        ->middleware('guest')->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'resetPasswordRequest'])
        ->middleware('guest')->name('password.update');

});


