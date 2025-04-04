<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'transaction'], function () {
        Route::post('/create',[\App\Http\Controllers\Api\V1\TransactionController::class,'store']);
        Route::get('/{id}',[\App\Http\Controllers\Api\V1\TransactionController::class,'show']);
        Route::get('/',[\App\Http\Controllers\Api\V1\TransactionController::class,'index']);
        Route::put('/{id}',[\App\Http\Controllers\Api\V1\TransactionController::class,'update']);
        Route::delete('/{id}',[\App\Http\Controllers\Api\V1\TransactionController::class,'destroy']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/',[\App\Http\Controllers\Api\V1\UserController::class,'index']);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
