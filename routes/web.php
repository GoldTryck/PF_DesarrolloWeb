<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// localhost => main
Route::view('/','main')->name('home');
//localhost/blog => blog
Route::get('/blog',[PostController::class, 'index'])->name('blog');
Route::get('blog/{post}', [PostController::class,'show']);