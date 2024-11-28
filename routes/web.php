<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MustahiqController;

use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DataControllerController;
use App\Http\Controllers\JenisPenerimaanController;
use App\Http\Controllers\JenisPenyaluranController;
use App\Http\Controllers\JenisPengeluaranController;
use App\Http\Controllers\LaporanPenerimaanController;
use App\Http\Controllers\LaporanPenyaluranController;
use App\Http\Controllers\LaporanPengeluaranController;
use App\Http\Controllers\TransaksiPenerimaanController;
use App\Http\Controllers\TransaksiPenyaluranController;
use App\Http\Controllers\TransaksiPengeluaranController;
use App\Http\Controllers\Users;

Route::get('/', function () {
    return view('index');
});

// Middleware untuk autentikasi
Route::middleware('auth')->group(function () {
    
    // Data Master
    Route::prefix('datamaster')->group(function () {
        Route::get('/users', [Users::class, 'index'])->name('users.index');
        Route::get('/users/formAdd', [Users::class, 'create'])->name('users.create');
        Route::post('/users/formAdd', [Users::class, 'store'])->name('users.store');
        Route::get('/users/{id}/formEdit', [Users::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}/formEdit', [Users::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [Users::class, 'destroy'])->name('users.destroy');
        Route::get('/export/users' , [Users::class, 'export'])->name('users.export');

        Route::resource('/muzakki', MuzakkiController::class);
        Route::get('/export/muzakki', [MuzakkiController::class, 'export'])->name('muzakki.export');
        Route::resource('/mustahiq', MustahiqController::class);
        Route::get('/export/mustahiq' , [MustahiqController::class, 'export'])->name('mustahiq.export');
        Route::resource('/jenis-penerimaan', JenisPenerimaanController::class);
        Route::resource('/jenis-pengeluaran', JenisPengeluaranController::class);
        Route::resource('/jenis-penyaluran', JenisPenyaluranController::class);
    });

    // Informasi
    Route::prefix('informasi')->group(function () {
        Route::resource('/informasi-informasi', InformasiController::class);
        Route::get('informasi/informasi-kategori/{category}/edit', [CategoryController::class, 'edit'])->name('informasi-kategori.edit');
        Route::put('informasi/informasi-kategori/{category}', [CategoryController::class, 'update'])->name('informasi-kategori.update');
        Route::resource('/informasi-kategori', CategoryController::class);
    });

    // Transaksi
    Route::prefix('transaksi')->group(function () {
        Route::resource('/transaksi-penerimaan', TransaksiPenerimaanController::class);
        Route::resource('/transaksi-penyaluran', TransaksiPenyaluranController::class);
        Route::get('/export/transpenyaluran', [TransaksiPenyaluranController::class, 'export'])->name('transpenyaluran.export');  
        Route::resource('/transaksi-pengeluaran', TransaksiPengeluaranController::class);
        Route::get('/export/transpengeluaran' , [TransaksiPengeluaranController::class, 'export'])->name('transpengeluaran.export');
    });

    // Export Data
    Route::get('/data/export', [DataControllerController::class, 'export'])->name('data.export');
    Route::get('/penyaluran/export', [LaporanPenyaluranController::class, 'export'])->name('penyaluran.export');

    // Laporan
    Route::prefix('laporan')->group(function () {
        Route::get('/penerimaan', [LaporanPenerimaanController::class, 'index'])->name('penerimaan.index');
        Route::get('/pengeluaran', [LaporanPengeluaranController::class, 'index'])->name('pengeluaran.index');
        Route::get('/penyaluran', [LaporanPenyaluranController::class, 'index'])->name('penyaluran.index');
    });

});

// Pengaturan
Route::get('/Pengaturan/index', function () {
    return view('Pengaturan.index');
})->middleware('auth');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes untuk autentikasi (seperti login/register) tetap di luar auth middleware
require __DIR__ . '/auth.php';

?>
