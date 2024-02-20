<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->group(function(){

Route::apiResource('/posts',PostController::class);
Route::apiResource('/users',UserController::class);
Route::apiResource('/users/{user}/posts',UserPostController::class);

});
