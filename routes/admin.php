<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('list_user');
    Route::get('/logout',[UserController::class,'logout'])->name('user_logout');
    Route::get('/{id}/delete', [UserController::class, 'destroy'])->name('delete_user');
    Route::get('/update-status/{id}', [UserController::class, 'update_status'])->name('user_update_status');
    Route::get('/create',[UserController::class,'create'])->name('create_user');
    Route::post('/create',[UserController::class,'store'])->name('save_user');
    Route::get('/{id}/edit',[UserController::class,'edit'])->name('edit_user');
    Route::post('/{id}/edit',[UserController::class,'update'])->name('update_user');
    Route::get('/{id}/profile',[UserController::class,'detail'])->name('show_profile');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('list_product');
    Route::get('/{id}/delete', [ProductController::class, 'destroy'])->name('delete_product');
    Route::get('/update-status/{id}', [ProductController::class, 'update_status'])->name('product_update_status');
    Route::get('/create', [ProductController::class, 'create'])->name('create_product');
    Route::post('/create', [ProductController::class, 'store'])->name('save_product');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::post('/{id}/edit', [ProductController::class, 'update'])->name('update_product');
});
