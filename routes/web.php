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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['controller' => App\Http\Controllers\Admin\DashboardController::class], function () {
        Route::get('/dashboard', 'index')->name('dashboard');

        Route::get('/importDatabase', 'importDatabase')->name('import.database');
        Route::post('/import', 'import');

        Route::get('/exportDatabase', 'exportDatabase')->name('export.database');
        Route::post('/export', 'export');
    });

    Route::group(['prefix' => 'reviews', 'controller' => App\Http\Controllers\Admin\ReviewController::class], function () {
        Route::get('/', 'index')->name('reviews.index');
        Route::get('{id}', 'show')->name('reviews.show');
    });

    Route::group(['prefix' => 'feedbacks', 'controller' => App\Http\Controllers\Admin\FeedbackController::class], function () {
        Route::get('/', 'index')->name('feedbacks.index');
        Route::get('{id}', 'show')->name('feedbacks.show');
    });

    Route::group(['prefix' => 'orders', 'controller' => App\Http\Controllers\Admin\OrderController::class], function () {
        Route::get('/', 'index')->name('orders.index');
        Route::get('{id}', 'show')->name('orders.show');
    });

    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->only(
        'index',
        'show',
    );

    Route::resource('products', App\Http\Controllers\Admin\ProductController::class)->except([
        'show',
    ]);

    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)->except([
        'show',
    ]);

    Route::resource('cities', App\Http\Controllers\Admin\CityController::class)->except([
        'show',
    ]);

    Route::resource('announcements', App\Http\Controllers\Admin\AnnouncementController::class)->except([
        'show',
    ]);
});
