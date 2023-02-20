<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\level_userController;
use App\Http\Controllers\lokasiController;
use App\Http\Controllers\PeminjamanBarangController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\UserController;
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

Route::resource('barang', BarangController::class);
Route::resource('supplier', supplierController::class);
Route::resource('sumber_dana', SumberDanaController::class);
Route::resource('level_user', level_userController::class);
Route::resource('user', UserController::class);
Route::resource('lokasi', lokasiController::class);
Route::resource('detail_barang', DetailBarangController::class);
Route::resource('barang_keluar', BarangKeluarController::class);
Route::resource('peminjaman_barang', PeminjamanBarangController::class);
