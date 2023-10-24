<?php

use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// localhost => main
Route::view('/','main')->name('home');

Route::resource('blog', PostController::class, [
    'names' => 'posts',
    'parameters' => ['blog' => 'post'],

]);

Route::view('/about', 'about')->name('about')->middleware('auth');

Route::view('/login','auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'store']);

Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::view('/register','auth.register')->name('register');
Route::post('/register',[RegisterUserController::class,'store']);