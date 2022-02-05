<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

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

Route::middleware(['connection','verified'])->prefix('dashboard')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user/new', [UserController::class, 'new'])->name('user.new');
    Route::post('/user/new', [UserController::class, 'add'])->name('user.add');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');
    Route::get('/profile/edit', [UserController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/profile/edit', [UserController::class, 'profileUpdate'])->name('profile.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});
