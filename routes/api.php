<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\FriendRequestResponseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->group(function () {


    Route::get('auth-user', [AuthUserController::class, 'show']);
    Route::apiResource('/posts', PostController::class);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/users/{user}/posts', UserPostController::class);
    Route::post('/friend-request', [FriendRequestController::class, 'store']);
    Route::post('friend-request-response', [FriendRequestResponseController::class, 'store']);
});
