<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\KegiatanDonorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\PresensiController;
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
Route::post('/presensi/hadir/warga', [App\Http\Controllers\PresensiController::class, 'insertPresensi'])->name('presensi.insert.warga');
Route::post('/presensi/hadir', [App\Http\Controllers\PresensiController::class, 'insertPresensiDonor'])->name('presensi.insert.donor');
Route::post('/presensi/hadir/donor/admin', [App\Http\Controllers\PresensiController::class, 'presensiDonorDariAdmin'])->name('presensi.insert.admin');
Route::post('/presensi/hadir/kegiatan/admin', [App\Http\Controllers\PresensiController::class, 'presensiKegiatanDariAdmin'])->name('presensi.kegiatan.admin');
Route::put('/presensi/change/status/{id}', [App\Http\Controllers\PresensiController::class, 'changeStatusDonor'])->name('presensi.change.status');

Auth::routes();

Route::prefix('superadmin')
        ->middleware(['auth','IsSuperAdmin'])
        ->group(function(){
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
            Route::resource('warga', WargaController::class);
            Route::resource('kegiatan', KegiatanController::class);
            Route::resource('user', UserController::class);
            Route::resource('donor', KegiatanDonorController::class);
            Route::resource('element', ElementController::class);
            Route::get('laporan/presensi',[KegiatanController::class, 'summary'])->name('laporan');
            Route::get('/list/cabang',[AdminController::class, 'getCabang'])->name('cabang.list');
            Route::get('/maisah/list', [MaisahController::class,'list'])->name('usaha-warga.list');
            Route::get('search-nik',[AdminController::class,'searchNik'])->name('search-nik');
        });

Route::prefix('admin')
        ->middleware(['auth','IsAdmin'])
        ->group(function(){
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
            Route::resource('warga', WargaController::class);
            Route::resource('kegiatan', KegiatanController::class);
            Route::resource('user', UserController::class);
            Route::resource('donor', KegiatanDonorController::class);
            Route::resource('element', ElementController::class);
            Route::get('panita/kegiatan',[KegiatanController::class, 'panitia'])->name('panitia.kegiatan');
            Route::get('panita/kegiatan/create',[KegiatanController::class, 'panitia_create'])->name('panitia.kegiatan.create');
            Route::post('panita/kegiatan/presensi',[PresensiController::class, 'presensiPanitiaKurban'])->name('panitia.presensi');
            Route::post('panita/kegiatan',[KegiatanController::class, 'insertPanitia'])->name('panitia.kegiatan.insert');
            Route::get('laporan/presensi',[KegiatanController::class, 'summary'])->name('laporan');
            Route::get('/list/cabang',[AdminController::class, 'getCabang'])->name('cabang.list');
            Route::get('/maisah/list', [MaisahController::class,'list'])->name('usaha-warga.list');
            Route::get('search-nik',[AdminController::class,'searchNik'])->name('search-nik');
            Route::get('kegiatan/presensi/{event_id}',[KegiatanController::class,'presensi'])->name('kegiatan.presensi');
        });

Route::prefix('warga')
        ->middleware(['auth','IsWarga'])
        ->group(function(){
            Route::get('/', [App\Http\Controllers\HomeController::class, 'warga'])->name('dashboard.warga');
            Route::resource('profile', ProfileController::class);
            // Route::resource('kegiatan', KegiatanController::class);
            Route::get('/presensi/warga', [ProfileController::class,'presensi'])->name('presensi.warga');
            Route::get('/maisah', [MaisahController::class,'add'])->name('maisah.add');
            Route::post('/maisah', [MaisahController::class,'insert'])->name('maisah.insert');
            Route::post('/maisah', [MaisahController::class,'insert'])->name('maisah.insert');
            Route::get('/maisah/list', [MaisahController::class,'list'])->name('maisah.list');
            Route::get('/change-password/{id}', [ProfileController::class,'changePassword'])->name('change-password');
            Route::patch('/update-password/{user}', [ProfileController::class,'updatePasswordUser'])->name('update-password');

        });


