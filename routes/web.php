<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// localhost => main
Route::view('/','main')->name('home');

Route::resource('blog', PostController::class, [
    'names' => 'posts',
    'parameters' => ['blog' => 'post'],

]);