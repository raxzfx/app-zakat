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

Route::get('/DataMaster/users/form',function(){
    return view('DataMaster.Users.form');
});


?>

