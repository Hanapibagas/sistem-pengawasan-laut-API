<?php

use App\Http\Controllers\Admin\DataPenanamanMangroveController;
use App\Http\Controllers\Admin\DataSebaranTerumbuKarangController;
use App\Http\Controllers\Admin\GeoJenisController;
use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\PraturanController;
use App\Http\Controllers\Admin\TahunController;
use App\Http\Controllers\Admin\TambahPenggunaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', function () {
    return view("auth.login");
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('jenis-geo', GeoJenisController::class);
    Route::resource('jenis', JenisController::class);
    Route::resource('praturan', PraturanController::class);
    Route::resource('tahun-penanaman', TahunController::class);
    Route::resource('data-penanaman', DataPenanamanMangroveController::class);
    Route::resource('data-sebaran-terumbu-karang', DataSebaranTerumbuKarangController::class);

    // tambah pengguna
    Route::get('tambah-pengguna', [TambahPenggunaController::class, 'index'])->name('tambah-pengguna-index');
    Route::get('tambah-pengguna/create', [TambahPenggunaController::class, 'create'])->name('tambah-pengguna-create');
    Route::post('tambah-pengguna/post', [TambahPenggunaController::class, 'register'])->name('tambah-pengguna-register');
    Route::delete('tambah-pengguna/hapus/{id}', [TambahPenggunaController::class, 'delete'])->name('tambah-pengguna-delete');
});
