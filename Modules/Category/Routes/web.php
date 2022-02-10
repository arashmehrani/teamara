<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

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

Route::middleware(['connection', 'verified'])->prefix('dashboard')->group(function () {

    Route::get('/category', [CategoryController::class, 'index'])->name('categories');
    Route::post('/category/new', [CategoryController::class, 'new'])->name('category.new');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit', [CategoryController::class, 'update'])->name('category.update');

});
