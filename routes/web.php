<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Market\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');
    Route::prefix('market')->namespace('Market')->group(function () {
        Route::prefix('category')->group(function () {

            Route::get('/', [CategoryController::class, 'index'])->name('admin.market.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.market.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.market.category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.market.category.edit');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.market.category.update');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.market.category.destroy');
        });
    });
});
