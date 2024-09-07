<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/cms-unkhair/cp')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // media
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/upload', [MediaController::class, 'upload'])->name('file.upload');
    // posts
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/create-post', [PostsController::class, 'create'])->name('posts.create');
    Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
    // Route::post('/upload-image', [PostsController::class, 'uploadImage'])->name('upload.image');
    Route::post('/posts/bulk', [PostsController::class, 'bulk'])->name('posts.bulk_action');
    // themes
    
    Route::get('/tema', [ThemeController::class, 'index'])->name('tema.index');
    Route::get('/ganti-tema/{themeId}', [ThemeController::class, 'switchTheme'])->name('ganti.tema');

});
