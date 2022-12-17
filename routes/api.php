<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BiotaKabupatenController;
use App\Http\Controllers\API\BiotaLautController;
use App\Http\Controllers\API\GeoJenisController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\JenisBiotaLautController;
use App\Http\Controllers\API\KabKotaController;
use App\Http\Controllers\API\PeraturanController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:api']], function () {
    // route user
    Route::post('user/update', [UserController::class, 'updateprofile']);
    Route::get('user', [UserController::class, 'user']);

    // route peraturan
    Route::get('peraturan', [PeraturanController::class, 'index']);
    Route::post('peraturan/create', [PeraturanController::class, 'store']);
    Route::get('peraturan/{id}', [PeraturanController::class, 'show']);
    Route::post('peraturan/update/{id}', [PeraturanController::class, 'update']);
    Route::delete('peraturan/delete/{id}', [PeraturanController::class, 'destroy']);

    // route kab/kota
    Route::get('kabupaten', [KabKotaController::class, 'index']);
    Route::get('kabupaten/{id}', [KabKotaController::class, 'show']);
    Route::post('kabupaten/create', [KabKotaController::class, 'story']);
    Route::post('kabupaten/update/{id}', [KabKotaController::class, 'update']);
    Route::delete('kabupaten/delete/{id}', [KabKotaController::class, 'destroy']);

    // jenis biota laut
    Route::get('jenis', [JenisBiotaLautController::class, 'index']);
    Route::get('jenis/{id}', [JenisBiotaLautController::class, 'show']);
    Route::post('jenis/create', [JenisBiotaLautController::class, 'store']);
    Route::post('jenis/update/{id}', [JenisBiotaLautController::class, 'update']);
    Route::delete('jenis/delete/{id}', [JenisBiotaLautController::class, 'destroy']);

    // biota laut
    Route::get('biota', [BiotaLautController::class, 'index']);
    Route::get('biota/{id}', [BiotaLautController::class, 'show']);
    Route::post('biota/create', [BiotaLautController::class, 'store']);
    Route::get('biota/search-by-jenis-biota-laut/{id}', [BiotaLautController::class, 'search']);
    Route::post('biota/update/{id}', [BiotaLautController::class, 'update']);
    Route::delete('biota/delete/{id}', [BiotaLautController::class, 'destroy']);

    // gambar
    Route::get('gambar/biota/{id}', [ImageController::class, 'show']);

    // kabupaten
    Route::get('biota/kabupaten/{id}', [BiotaKabupatenController::class, 'show']);

    // gepjenis
    Route::get('geo-jenis/{id}', [GeoJenisController::class, 'show']);
});
// route user
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
