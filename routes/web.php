<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/',function(){
    return view('home');
})
->middleware('auth');
