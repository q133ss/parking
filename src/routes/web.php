<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function (){
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/lk', [\App\Http\Controllers\LkController::class, 'index'])->name('lk.index');
});

Route::group(['middleware' => ['auth', 'is.admin']], function (){
    Route::get('/admin', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.index');
});


Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout']);
