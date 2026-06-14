<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Basic route
Route::get('/', function () {
    return view('welcome');
});

//user route
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show')
    ->where('id', '[0-9]+');
Route::get('/users/{username}/{email}', [UserController::class, 'getUsernameEmail'])->name('users.getUsernameEmail');

//product route
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{id}', [ProductController::class, 'byCategory'])->name('products.byCategory');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// category route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/update/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/frontend', function () {
    return view('categories.frontend');
})->name('categories.frontend');

// customer route
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// movie route
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
