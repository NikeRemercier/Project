<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\level_userController;
use App\Http\Controllers\lokasiController;
use App\Http\Controllers\sumber_danaController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\userController;
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

Route::resource('barang', barangController::class);
Route::resource('supplier', supplierController::class);
Route::resource('sumber_dana', sumber_danaController::class);
Route::resource('level_user', level_userController::class);
Route::resource('user', userController::class);
Route::resource('lokasi', lokasiController::class);