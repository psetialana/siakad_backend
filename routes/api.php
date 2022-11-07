<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('mahasiswas', App\Http\Controllers\API\MahasiswaAPIController::class);


Route::resource('matakuliahs', App\Http\Controllers\API\MatakuliahAPIController::class);


Route::resource('krs', App\Http\Controllers\API\KrsAPIController::class);


Route::resource('dosens', App\Http\Controllers\API\DosenAPIController::class);


Route::resource('pengampus', App\Http\Controllers\API\PengampuAPIController::class);
