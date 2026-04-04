<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Product\IndexController;
use App\Http\Controllers\Product\CreateController;
use App\Http\Controllers\Product\StoreController;
use App\Http\Controllers\Product\ShowController;
use App\Http\Controllers\Product\EditController;
use App\Http\Controllers\Product\UpdateController;
use App\Http\Controllers\Product\DestroyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('welcome');
});

Route::group([], function() {
    Route::get('/products', IndexController::class)->name('product.index');
    Route::get('/products/create', CreateController::class)->name('product.create');
    Route::post('/products', StoreController::class)->name('product.store');
    Route::get('/products/{product}', ShowController::class)->name('product.show');
    Route::get('/products/{product}/edit', EditController::class)->name('product.edit');
    Route::patch('/products/{product}', UpdateController::class)->name('product.update');
    Route::delete('/products/{product}', DestroyController::class)->name('product.destroy');
});


Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tags', [TagController::class, 'store'])->name('tag.store');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tag.show');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
Route::patch('/tags/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

