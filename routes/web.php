<?php

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


?>

