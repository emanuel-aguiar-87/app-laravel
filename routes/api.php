<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
        return response()->json($request->all());
    });

});

Route::post('/authenticate', [\App\Http\Controllers\Api\AuthApiController::class, 'authenticate'])->name('api.authenticate');



