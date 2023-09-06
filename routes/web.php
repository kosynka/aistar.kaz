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
    });

    Route::group(['prefix' => 'feedbacks', 'controller' => App\Http\Controllers\Admin\FeedbackController::class], function () {
        Route::get('/', 'index')->name('feedbacks.index');
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

    Route::resource('feedbacks', App\Http\Controllers\Admin\FeedbackController::class)->except([
        'show',
    ]);

    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->except([
        'show',
    ]);

    Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class)->except([
        'show',
    ]);

    Route::get('categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('categories.edit');

    Route::get('feedbacks/create', [App\Http\Controllers\Admin\FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::get('feedbacks/{feedback}/edit', [App\Http\Controllers\Admin\FeedbackController::class, 'edit'])->name('feedbacks.edit');

    Route::get('cities/create', [App\Http\Controllers\Admin\CityController::class, 'create'])->name('cities.create');
    Route::get('cities/{city}/edit', [App\Http\Controllers\Admin\CityController::class, 'edit'])->name('cities.edit');

    Route::get('reviews/create', [App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('reviews.create');
    Route::get('reviews/{reviews}/edit', [App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('reviews.edit');

    Route::get('announcements/create', [App\Http\Controllers\Admin\AnnouncementController::class, 'create'])->name('announcements.create');
    Route::get('announcements/{announcement}/edit', [App\Http\Controllers\Admin\AnnouncementController::class, 'edit'])->name('announcements.edit');

    Route::get('products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
    Route::get('products/{products}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');

    Route::get('users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::get('users/{users}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
});
