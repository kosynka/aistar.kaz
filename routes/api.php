<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'controller' => App\Http\Controllers\Api\AuthController::class], function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
});

Route::group(['prefix' => 'cities', 'controller' => App\Http\Controllers\Api\CityController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::group(['prefix' => 'categories', 'controller' => App\Http\Controllers\Api\CategoryController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::group(['prefix' => 'products', 'controller' => App\Http\Controllers\Api\ProductController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::get('/add-to-cart', 'addToCart');
});
