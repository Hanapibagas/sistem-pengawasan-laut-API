<?php

use App\Http\Controllers\Admin\GeoJenisController;
use App\Http\Controllers\Admin\JenisController;
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

// Route::get('/', [HomeController::class, 'Welcome']);

// Route::prefix('/')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('dashboard');
// });

Route::get('/', function () {
    return view("auth.login");
});

// Route::get('/test', function () {
//     return "ok";
// })->middleware("auth");

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('jenis-geo', GeoJenisController::class);
    Route::resource('jenis', JenisController::class);
});

// Route::middleware('auth')->group(function () {
// Route::get('/home', [HomeController::class, 'index'])->middleware("auth");
// });
