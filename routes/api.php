<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
        $user = Auth::user();
        return response()->json($user);
    });

    Route::post('/revoke-token', [\App\Http\Controllers\Api\AuthApiController::class, 'revokeToken'])->name('api.revoke-token');


    Route::apiResource('posts', PostController::class)->names([
        'index' => 'api.posts.index',
        'store' => 'api.posts.store',
        'show' => 'api.posts.show',
        'update' => 'api.posts.update',
        'destroy' => 'api.posts.destroy',
    ]);

    Route::apiResource('categories', CategoryController::class)->names([
        'index' => 'api.categories.index',
        'store' => 'api.categories.store',
        'show' => 'api.categories.show',
        'update' => 'api.categories.update',
        'destroy' => 'api.categories.destroy',
    ]);

    Route::apiResource('users', UserController::class)->names([
        'index' => 'api.users.index',
        'store' => 'api.users.store',
        'show' => 'api.users.show',
        'update' => 'api.users.update',
        'destroy' => 'api.users.destroy',
    ]);
});

Route::post('/authenticate', [\App\Http\Controllers\Api\AuthApiController::class, 'authenticate'])->name('api.authenticate');

