<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\RegisterController;
use App\Http\Controllers\web\SessionsController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login',[SessionsController::class,'create'])
    ->middleware('guest')
    ->name('login.index');
Route::post('/login',[SessionsController::class,'store'])
    ->name('login.store');
Route::get('/logout',[SessionsController::class,'destroy'])
    ->name('login.destroy');


Route::get('/register',[RegisterController::class,'create'])
    ->middleware('guest')
    ->name('register.index');
Route::post('/register',[RegisterController::class,'store'])
    ->name('register.store');
