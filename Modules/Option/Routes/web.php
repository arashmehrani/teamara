<?php

use Illuminate\Support\Facades\Route;
use Modules\Option\Http\Controllers\OptionController;

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

Route::middleware(['verified'])->prefix('dashboard')->group(function () {
    Route::get('/options', [OptionController::class, 'index'])->name('options');
    Route::post('/options', [OptionController::class, 'optionsUpdate'])->name('options.update');
    Route::get('/options/status', [OptionController::class, 'status'])->name('options.status');
    Route::get('/options/email', [OptionController::class, 'email'])->name('options.email');
    Route::post('/options/email', [OptionController::class, 'emailUpdate'])->name('options.email.update');
});
