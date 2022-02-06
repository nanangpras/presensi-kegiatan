<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\Warga\MaisahController;
use App\Http\Controllers\Warga\ProfileController;
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
    return view('auth.login');
});

Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('home.presensi');
Route::post('/presensi/seacrh', [App\Http\Controllers\PresensiController::class, 'search'])->name('home.presensi.search');
Route::post('/presensi', [App\Http\Controllers\PresensiController::class, 'presensi'])->name('klik.presensi');
Route::post('/presensi/hadir', [App\Http\Controllers\PresensiController::class, 'insertPresensi'])->name('presensi.insert');

Auth::routes();

Route::prefix('admin')
        ->middleware(['auth','IsAdmin'])
        ->group(function(){
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
            Route::resource('warga', WargaController::class);
            Route::resource('kegiatan', KegiatanController::class);
            Route::resource('user', UserController::class);
            Route::resource('element', ElementController::class);
            Route::get('laporan/presensi',[KegiatanController::class, 'summary'])->name('laporan');
            Route::get('/list/cabang',[AdminController::class, 'getCabang'])->name('cabang.list');
            Route::get('/maisah/list', [MaisahController::class,'list'])->name('usaha-warga.list');
        });

Route::prefix('warga')
        ->middleware(['auth','IsWarga'])
        ->group(function(){
            Route::get('/', [App\Http\Controllers\HomeController::class, 'warga'])->name('dashboard.warga');
            Route::resource('profile', ProfileController::class);
            Route::get('/presensi/warga', [ProfileController::class,'presensi'])->name('presensi.warga');
            Route::get('/maisah', [MaisahController::class,'add'])->name('maisah.add');
            Route::post('/maisah', [MaisahController::class,'insert'])->name('maisah.insert');
            Route::post('/maisah', [MaisahController::class,'insert'])->name('maisah.insert');
            Route::get('/maisah/list', [MaisahController::class,'list'])->name('maisah.list');
            Route::get('/change-password/{id}', [ProfileController::class,'changePassword'])->name('change-password');
            Route::patch('/update-password/{user}', [ProfileController::class,'updatePasswordUser'])->name('update-password');

        });


