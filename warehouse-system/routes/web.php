<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\InfoPelangganController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes for Barang
Route::resource('barang', BarangController::class);

// Resource routes for Pelanggan
Route::resource('pelanggan', InfoPelangganController::class);

// Resource routes for Transaksi
Route::resource('transaksi', TransaksiController::class);

// Alternative routes if you prefer specific naming
Route::group(['prefix' => 'warehouse'], function () {
    Route::get('/barang', [BarangController::class, 'index'])->name('warehouse.barang.index');
    Route::get('/pelanggan', [InfoPelangganController::class, 'index'])->name('warehouse.pelanggan.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('warehouse.transaksi.index');
});