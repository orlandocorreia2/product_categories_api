<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Categories\Controllers\CategoryController;

Route::group(['prefix' => 'categories'], function ($router) {
    Route::post('/', [CategoryController::class, 'create']);
    Route::get('/', [CategoryController::class, 'findAll']);
    Route::get('/{id}', [CategoryController::class, 'findOne']);
    Route::patch('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});
