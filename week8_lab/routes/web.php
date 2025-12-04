<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Middleware\AdminMiddleware;


Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('users', AdminUserController::class)->except(['show']);
    Route::resource('posts', AdminPostController::class)->except(['show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Homepage showing all posts
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Show single post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');



Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});



Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Create a new post
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Edit a post
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Update a post
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    // Delete a post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // View posts by a specific user
    Route::get('/users/{user}/posts', [DashboardController::class, 'userPosts'])
        ->name('users.posts');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/logout', function () {
    return redirect()->route('posts.index');
});
