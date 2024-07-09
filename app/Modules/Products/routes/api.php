<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Products\Controllers\ProductController;

Route::group(['prefix' => 'products'], function ($router) {
    Route::post('/', [ProductController::class, 'create']);
    Route::get('/', [ProductController::class, 'findAll']);
    Route::get('/{id}', [ProductController::class, 'findOne']);
    Route::patch('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});
