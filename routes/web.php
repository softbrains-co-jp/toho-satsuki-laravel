<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::prefix('/user')->name('user.')->group(function () {
        // パスワード変更
        Route::get('/password', [UserController::class, 'password'])->name('password');
    });
});
