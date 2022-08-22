<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\transaksiController;

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

  Route::get('/admin/barang/tabel_barang', [barangController::class, 'tabel_barang']);
    Route::get('/admin/barang/kode_barang', [barangController::class, 'kode_barang']);
    Route::post('/admin/barang/create', [barangController::class, 'create']);
    Route::get('/admin/barang/{id}/edit', [barangController::class, 'edit']);
    Route::post('/admin/barang/{id}/update', [barangController::class, 'update']);
    Route::get('/admin/barang/{id}/delete', [barangController::class, 'delete']);

     Route::get('/admin/customer/tabel_customer', [customerController::class, 'tabel_customer']);
    Route::get('/admin/customer/kode_customer', [customerController::class, 'kode_customer']);
    Route::post('/admin/customer/create', [customerController::class, 'create']);
    Route::get('/admin/customer/{id}/edit', [customerController::class, 'edit']);
    Route::post('/admin/customer/{id}/update', [customerController::class, 'update']);
    Route::get('/admin/customer/{id}/delete', [customerController::class, 'delete']);

     Route::get('/admin/transaksi/tabel_transaksi', [transaksiController::class, 'tabel_transaksi']);
    Route::get('/admin/transaksi/{id}/tabel_detail', [transaksiController::class, 'tabel_detail']);
    Route::get('/admin/transaksi/no_transaksi', [transaksiController::class, 'no_transaksi']);
    Route::get('/admin/transaksi/kode_customer', [transaksiController::class, 'kode_customer']);
    Route::get('/admin/transaksi/{id}/data_customer', [transaksiController::class, 'data_customer']);
    Route::get('/admin/transaksi/kode_barang', [transaksiController::class, 'kode_barang']);
    Route::get('/admin/transaksi/{id}/data_barang', [transaksiController::class, 'data_barang']);
    Route::post('/admin/transaksi/create_barang', [transaksiController::class, 'create_barang']);
    Route::post('/admin/transaksi/{id}/create_transaksi', [transaksiController::class, 'create_transaksi']);
    Route::post('/admin/transaksi/tambah_barang', [transaksiController::class, 'tambah_barang']);
    Route::get('/admin/transaksi/total', [transaksiController::class, 'total']);
    Route::get('/admin/transaksi/grand_total', [transaksiController::class, 'grand_total']);
    Route::get('/admin/transaksi/{id}/edit_barang', [transaksiController::class, 'edit_barang']);
    Route::get('/admin/transaksi/{id}/edit_transaksi', [transaksiController::class, 'edit_transaksi']);
    Route::post('/admin/transaksi/{id}/update_barang', [transaksiController::class, 'update_barang']);
    Route::get('/admin/transaksi/{id}/delete', [transaksiController::class, 'delete']);
    Route::get('/admin/transaksi/{id}/delete_barang', [transaksiController::class, 'delete_barang']);
    Route::get('/admin/transaksi/{id}/delete_transaksi', [transaksiController::class, 'delete_transaksi']);
    Route::get('/admin/transaksi/{id}/batal_transaksi', [transaksiController::class, 'batal_transaksi']);
