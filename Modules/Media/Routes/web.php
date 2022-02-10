<?php

use Illuminate\Support\Facades\Route;
use Modules\Media\Http\Controllers\MediaController;

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

    Route::get('/media', [MediaController::class, 'index'])->name('media');
    Route::get('/media/new', [MediaController::class, 'create'])->name('media.new');
    Route::post('/media/new', [MediaController::class, 'store'])->name('media.add');
    Route::delete('/media/delete/{id}', [MediaController::class, 'delete'])->name('media.delete');
    Route::get('/media/edit/{id}', [MediaController::class, 'edit'])->name('media.edit');

});
