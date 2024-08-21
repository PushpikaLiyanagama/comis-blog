<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/google',[GoogleController::class,'googlepage']);

Route::get('auth/google/callback',[GoogleController::class,'googlecallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-post', [App\Http\Controllers\PostController::class, 'create'])->name('create_post')->middleware('auth');


Route::post('/submit-post', [PostController::class, 'store'])->name('submit.post');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('posts/{id}', [PostController::class, 'show'])->name('post.show');