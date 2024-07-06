<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterestedController;
use App\http\Controllers\LogoutController;
use App\Http\Middleware\AuthUserMiddleware;
use App\Http\Middleware\GuestUserMiddleware;


Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminController::class, 'store']);
    Route::delete('/admin/blogs/{blog}/delete', [AdminController::class, 'destroy']);
    Route::get('/admin/blogs/{blog}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/blogs/{blog}/update', [AdminController::class, 'update']);
});

Route::middleware(AuthUserMiddleware::class)->group(function(){
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::post('/blogs/{blog:slug}/handle-interest', [InterestedController::class, 'toggle']);
    Route::post('/logout', [LogoutController::class, 'destroy']);
});

Route::middleware(GuestUserMiddleware::class)->group(function(){
    Route::get('/', [BlogController::class, 'index']);
        
});
Route::get('/', [BlogController::class, 'index']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']); 
Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/{user:username}', [ProfileController::class, 'show']); 
