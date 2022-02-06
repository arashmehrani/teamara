<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

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

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/post/new', [PostController::class, 'new'])->name('post.new');

});
