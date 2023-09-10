<?php

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
    return view ('welcome');
});


Route::middleware('auth')->group(function() {
    // Dashboard
    Route::get('/home', 'HomeController@index')->name('home');

    // Edit Profile
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    // Administrator
    Route::middleware('can:admin')->prefix('admin')->group(function(){
        Route::resource('kelas', KelasController::class)->except(['edit', 'create', 'show']);
        Route::resource('pengguna', UserController::class)->except(['edit', 'create', 'show']);
        Route::resource('admin-kas', AdminCashController::class);
        Route::resource('mutasi', MutasiController::class);
        Route::resource('laporan', LaporanController::class)->only('index', 'store');
    });

    // Bendahara
    Route::middleware('can:bendahara')->prefix('bendahara')->group(function(){
        Route::resource('bendahara-kas', BendaharaCashController::class);
        Route::resource('bendahara-mutasi', BendaharaMutasiController::class);
        Route::resource('bendahara-laporan', BendaharaLaporanController::class)->only('index', 'store');
    });

    // Siswa
        Route::resource('siswa-kas', SiswaCashController::class);
        Route::resource('siswa-mutasi', SiswaMutasiController::class);
        Route::resource('siswa-laporan', SiswaLaporanController::class)->only('index', 'store');
});
