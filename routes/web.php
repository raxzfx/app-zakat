<?php

use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MustahiqController;
use App\Http\Controllers\JenisPenerimaanController;

use App\Http\Controllers\InformasiController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

use App\Http\Controllers\JenisPenyaluranController;
use App\Http\Controllers\JenisPengeluaranController;


Route::get('/', function () {
    return view('index');
});

//datamaster
Route::prefix('datamaster')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/users', [Users::class, 'index'])->name('users.index');
        Route::get('/users/formAdd',[Users::class, 'create'])->name('users.create');
        Route::post('/users/formAdd',[Users::class, 'store'])->name('users.store');
        Route::get('/users/{id}/formEdit',[Users::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}/formEdit',[Users::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [Users::class, 'destroy'])->name('users.destroy');
    });

    Route::resource('/muzakki', MuzakkiController::class);

    Route::resource('/mustahiq', MustahiqController::class);

    Route::resource('/jenis-penerimaan', JenisPenerimaanController::class);

    Route::resource('/jenis-pengeluaran', JenisPengeluaranController::class);

    Route::resource('/jenis-penyaluran', JenisPenyaluranController::class);
});
//informasi
Route::prefix('informasi')->group(function () {
    Route::resource('/informasi', InformasiController::class);  // Rute untuk Informasi
    Route::resource('/kategori', CategoryController::class);    // Rute untuk Kategori
});

//transaksi
route::prefix('transaksi')->group(function () {
    route::resource('/penerimaan', 'App\Http\Controllers\PenerimaanController');  
    route::resource('/penyaluran', 'App\Http\Controllers\PenyaluranController');  
});

Route::get('/Laporan/pengeluaran/index',function(){
     return view('Laporan.pengeluaran.index');
});



//penerimaan
Route::get('/Transaksi/penerimaan/create',function(){
    return view('Transaksi.penerimaan.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


    ?>