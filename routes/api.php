<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;
// This macro line registers all 5 required API CRUD endpoints safely:
// Route::apiResource('categories', CategoryController::class)->names('api.categories');
Route::apiResource('categories', CategoryController::class)->names([
    'index'   => 'api.categories.index',
    'store'   => 'api.categories.store',
    'show'    => 'api.categories.show',
    'update'  => 'api.categories.update',
    'destroy' => 'api.categories.destroy',
]);

