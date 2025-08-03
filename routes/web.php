<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('user/login', [UserController::class, 'login'])->name('login');
Route::post('user/login', [UserController::class, 'auth'])->name('users.auth');

// Grouped routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Post Routes
    Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('post/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('post/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('post/show/{id}', [PostController::class, 'show'])->name('posts.show');

    // My Posts
    Route::get('myposts', [PostController::class, 'myposts'])->name('myposts');

    // User Profile
    Route::get('user/create', [UserController::class, 'create'])->name('users.create');
    Route::post('user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('profile', [UserController::class, 'profile'])->name('profile.show');
    Route::post('profile/logout', [UserController::class, 'logout'])->name('logout');
});
