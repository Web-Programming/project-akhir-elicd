<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PustakawanController;
use App\Models\Pengembalian;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store']);
Route::get('/buku', [BukuController::class,'index'])->name('buku.index');
Route::get('/buku/{buku}', [BukuController::class, 'show'])->name('buku.show');
Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::patch('/buku/{buku}', [BukuController::class,'update'])->name('buku.update');
Route::patch('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/store', [AnggotaController::class, 'store']);
Route::get('/anggota', [AnggotaController::class,'index'])->name('anggota.index');
Route::get('/anggota/{anggota}', [AnggotaController::class, 'show'])->name('anggota.show');
Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::patch('/anggota/{anggota}', [AnggotaController::class,'update'])->name('anggota.update');
Route::patch('/anggota/{anggota}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

Route::get('/pustakawan/create', [PustakawanController::class, 'create'])->name('pustakawan.create');
Route::post('/pustakawan/store', [PustakawanController::class, 'store']);
Route::get('/pustakawan', [PustakawanController::class,'index'])->name('pustakawan.index');
Route::get('/pustakawan/{pustakawan}', [PustakawanController::class, 'show'])->name('pustakawan.show');
Route::get('/pustakawan/{pustakawan}/edit', [PustakawanController::class, 'edit'])->name('pustakawan.edit');
Route::patch('/pustakawan/{pustakawan}', [PustakawanController::class,'update'])->name('pustakawan.update');
Route::patch('/pustakawan/{pustakawan}', [PustakawanController::class, 'update'])->name('pustakawan.update');
Route::delete('/pustakawan/{pustakawan}', [PustakawanController::class, 'destroy'])->name('pustakawan.destroy');

Route::get('/pinjaman/create', [PinjamanController::class, 'create'])->name('pinjaman.create');
Route::post('/pinjaman/store', [PinjamanController::class, 'store']);
Route::get('/pinjaman', [PinjamanController::class,'index'])->name('pinjaman.index');
Route::get('/pinjaman/{pinjaman}', [PinjamanController::class, 'show'])->name('pinjaman.show');
Route::get('/pinjaman/{pinjaman}/edit', [PinjamanController::class, 'edit'])->name('pinjaman.edit');
Route::patch('/pinjaman/{pinjaman}', [PinjamanController::class,'update'])->name('pinjaman.update');
Route::patch('/pinjaman/{pinjaman}', [PinjamanController::class, 'update'])->name('pinjaman.update');
Route::delete('/pinjaman/{pinjaman}', [PinjamanController::class, 'destroy'])->name('pinjaman.destroy');

Route::get('/pengembalian/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
Route::post('/pengembalian/store', [PengembalianController::class, 'store']);
Route::get('/pengembalian', [PengembalianController::class,'index'])->name('pengembalian.index');
Route::get('/pengembalian/{pengembalian}', [PengembalianController::class, 'show'])->name('pengembalian.show');
Route::get('/pengembalian/{pengembalian}/edit', [PengembalianController::class, 'edit'])->name('pengembalian.edit');
Route::patch('/pengembalian/{pengembalian}', [PengembalianController::class,'update'])->name('pengembalian.update');
Route::patch('/pengembalian/{pengembalian}', [PengembalianController::class, 'update'])->name('pengembalian.update');
Route::delete('/pengembalian/{pengembalian}', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index')->middleware('auth');
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index')->middleware('auth');
Route::get('/pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index')->middleware('auth');
Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.index')->middleware('auth');
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index')->middleware('auth');
