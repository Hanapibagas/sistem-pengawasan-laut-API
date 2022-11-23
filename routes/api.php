<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KabKotaController;
use App\Http\Controllers\API\PeraturanController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// route user
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout']);
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
