<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\Users;

Route::get('/', function () {
    return view('index');
});


Route::get('/DataMaster',[Users::class, 'index'] )->name('users.index');
Route::get('/DataMaster/muzakki', function () {
    return view('DataMaster.muzakki.index');
});

Route::get('/DataMaster/users/formAdd',
    [Users::class, 'create']
)->name('users.create');

Route::get('/DataMaster/users/formEdit',function(){
    return view('DataMaster.Users.formEdit');
});
//penerimaan
Route::get('/Transaksi/penerimaan/create',function(){
    return view('Transaksi.penerimaan.create');
});


Route::post('/DataMaster/users/formAdd',
    [Users::class, 'store']
)-> name('users.store');

Route::get('/DataMaster/users/{id}/formEdit',
    [Users::class, 'edit']
)-> name('users.edit');

Route::put('/DataMaster/users/{id}/formEdit',
    [Users::class, 'update']
)-> name('users.update');

Route::delete('/DataMaster/users/{id}',
    [Users::class, 'destroy']
)-> name('users.destroy');

Route::get('/users', [Users::class, 'index'])->name('users.index');

Route::get('/DataMaster/muzakki', [MuzakkiController::class, 'index'])->name('muzakki.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
?>




