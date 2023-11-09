<?php

use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// localhost => main
Route::view('/', 'main')->name('home');


Route::resource('blog', PostController::class, [
    'names' => 'posts',
    'parameters' => ['blog' => 'post'],
]);

Route::resource('comments', CommentController::class, [
    'names' => 'comments',
    'parameters' => ['comments' => 'comment'],
]);

Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('posts/by_category/{category}', [PostController::class, 'by_category'])
    ->name('posts.by_category');
Route::get('posts/by_auth', [PostController::class, 'by_author'])->name('posts.by_author');
Route::post('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::view('/about', 'about')->name('about');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/users', [RegisterUserController::class, 'index'])->name('users.index');

