<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    }

    return redirect('login');
});

Route::group(['controller' => App\Http\Controllers\Admin\AuthController::class], function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/signin', 'signin')->name('signin');
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth:sanctum'], 'controller' => App\Http\Controllers\Admin\Dashboard::class], function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});
