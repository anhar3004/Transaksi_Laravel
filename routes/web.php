<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\transaksiController;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/cekLogin', [AuthController::class, 'proses_login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:Admin']], function () {});

    Route::get('/admin', [adminController::class, 'index']);

    Route::get('/admin/barang', [barangController::class, 'index']);
    Route::get('/admin/barang/cetak_laporan', [barangController::class, 'cetak_laporan']);

    Route::get('/admin/customer', [customerController::class, 'index']);
    Route::get('/admin/customer/cetak_laporan', [customerController::class, 'cetak_laporan']);

    Route::get('/admin/transaksi', [transaksiController::class, 'index']);
    Route::get('/admin/transaksi/cetak_laporan', [transaksiController::class, 'cetak_laporan']);
    Route::get('/admin/transaksi/cetak_pertanggal', [transaksiController::class, 'cetak_pertanggal']);
    Route::get('/admin/transaksi/{id}/cetak_detail', [transaksiController::class, 'cetak_detail']);

});
