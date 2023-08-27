<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'controller' => App\Http\Controllers\Api\AuthController::class], function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');

    Route::group(['prefix' => 'profile'], function () {
        Route::post('/show', 'showProfile');
        Route::post('/delete', 'destroyProfile');
    });
});

Route::group(['prefix' => 'categories', 'controller' => App\Http\Controllers\Api\CategoryController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::group(['prefix' => 'cities', 'controller' => App\Http\Controllers\Api\CityController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::group(['prefix' => 'announcements', 'controller' => App\Http\Controllers\Api\AnnouncementController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::group(['prefix' => 'products', 'controller' => App\Http\Controllers\Api\ProductController::class], function () {
    Route::get('/', 'index');
    
    Route::group(['prefix' => '{productId}'], function () {
        Route::get('/', 'show');

        Route::group(['prefix' => 'reviews', 'middleware' => ['auth:api'], 'controller' => App\Http\Controllers\Api\ReviewController::class], function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
        });
    });
});

Route::group(['prefix' => 'carts', 'middleware' => ['auth:api'], 'controller' => App\Http\Controllers\Api\CartController::class], function () {
    Route::get('/show', 'show');
    Route::post('/{productId}', 'add');
    Route::put('/{productId}', 'update');
    Route::delete('/{productId}', 'destroy');
    Route::get('/revoke', 'destroyCart');
});

Route::group(['prefix' => 'orders', 'middleware' => ['auth:api'], 'controller' => App\Http\Controllers\Api\OrderController::class], function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::delete('/{id}', 'destroy');

    // Payment
    Route::post('/{id}/pay', 'pay');
    Route::get('/{id}/status', 'status');
});

Route::group(['prefix' => 'feedbacks', 'middleware' => ['auth:api'], 'controller' => App\Http\Controllers\Api\FeedbackController::class], function () {
    Route::post('/', 'store');
});
