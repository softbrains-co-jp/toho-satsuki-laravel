<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;


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

    Route::name('main.')->group(function () {
        // パスワード変更
        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::get('/k/{kNo}', [MainController::class, 'index'])->name('search-k');
        Route::get('/m/{mNo}', [MainController::class, 'index'])->name('search-m');
        Route::post('/post', [MainController::class, 'post'])->name('post');
        Route::post('/lock/retain', [MainController::class, 'retainLock'])->name('lock-retain');
        Route::post('/lock/release', [MainController::class, 'releaseLock'])->name('lock-release');
    });

});
