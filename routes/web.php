<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/administrator', [DashboardController::class, 'index'])->name('admin.dashboard');

// Kategori
Route::get('/administrator/kategori', [KategoriController::class, 'index'])->name('admin.data.kategori');
Route::post('/administrator/kategori', [KategoriController::class, 'insert']);
Route::post('/administrator/kategori/update', [KategoriController::class, 'update'])->name('admin.kategori.update');
Route::get('/administrator/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.delete');

// Asset
Route::get('/administrator/aset', [AsetController::class, 'index'])->name('admin.data.aset');
Route::get('/administrator/aset/kategori/{slug}', [AsetController::class, 'showByKategori'])->name('admin.data.aset.kategori');
Route::get('/administrator/aset/import', [AsetController::class, 'viewImport'])->name('admin.import.aset');
Route::post('/administrator/aset/import', [AsetController::class, 'import']);

// Peminjaman
Route::get('/administrator/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman');
Route::get('/administrator/peminjaman/tambah', [PeminjamanController::class, 'create'])->name('admin.peminjaman.tambah');
Route::post('/administrator/peminjaman/tambah', [PeminjamanController::class, 'store'])->name('admin.peminjaman.store');
Route::get('/administrator/peminjaman/status/{id}', [PeminjamanController::class, 'status'])->name('admin.update.status');

// Laporan
Route::get('/administrator/laporan', [PeminjamanController::class, 'laporan'])->name('admin.laporan');