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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('mahasiswas', App\Http\Controllers\MahasiswaController::class);


Route::resource('matakuliahs', App\Http\Controllers\MatakuliahController::class);


Route::resource('krs', App\Http\Controllers\KrsController::class);


Route::resource('dosens', App\Http\Controllers\DosenController::class);


Route::resource('pengampus', App\Http\Controllers\PengampuController::class);
