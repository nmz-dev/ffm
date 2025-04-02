<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::post('/transaction/create',[\App\Http\Controllers\Api\V1\TransactionController::class,'store']);
    Route::get('/transaction/{id}',[\App\Http\Controllers\Api\V1\TransactionController::class,'show']);
    Route::get('/transaction',[\App\Http\Controllers\Api\V1\TransactionController::class,'index']);
    Route::put('/transaction/{id}',[\App\Http\Controllers\Api\V1\TransactionController::class,'update']);
    Route::delete('/transaction/{id}',[\App\Http\Controllers\Api\V1\TransactionController::class,'destroy']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
