<?php

use Illuminate\Support\Facades\Route;
use Modules\Installer\Http\Controllers\InstallerController;

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

Route::middleware(['web'])->group(function () {

    Route::get('/installer', [InstallerController::class, 'installer'])->name('installer');
    Route::post('/installer-check', [InstallerController::class, 'installerCheck'])->name('installer.check');
    Route::post('/installer-migration', [InstallerController::class, 'migration'])->name('installer.migration');
    Route::post('/installer-cancel', [InstallerController::class, 'cancel'])->name('installer.cancel');
    Route::post('/installer-admin', [InstallerController::class, 'admin'])->name('installer.admin');

});
