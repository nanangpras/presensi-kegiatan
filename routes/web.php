<?php

use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WargaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')
        ->middleware('auth')
        ->group(function(){
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
            Route::resource('warga', WargaController::class);
            Route::resource('kegiatan', KegiatanController::class);
            Route::resource('user', UserController::class);
            Route::resource('element', ElementController::class);
            Route::get('laporan/presensi',[KegiatanController::class, 'summary'])->name('laporan');
        });

Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('home.presensi');
Route::post('/presensi/seacrh', [App\Http\Controllers\PresensiController::class, 'search'])->name('home.presensi.search');
Route::post('/presensi', [App\Http\Controllers\PresensiController::class, 'presensi'])->name('klik.presensi');
