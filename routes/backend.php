<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostsCategoriesController;
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
    // categories
    Route::get('/posts/categories/all', [PostsCategoriesController::class, 'index'])->name('posts.categories.index');
    Route::post('/categories', [PostsCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [PostsCategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [PostsCategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [PostsCategoriesController::class, 'destroy'])->name('categories.destroy');
    // themes
    Route::get('/tema', [ThemeController::class, 'index'])->name('tema.index');
    Route::get('/ganti-tema/{themeId}', [ThemeController::class, 'switchTheme'])->name('ganti.tema');
    // pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit'); // Menampilkan form untuk edit halaman
    Route::put('/pages/{id}', [PageController::class, 'update'])->name('pages.update'); // Memperbarui halaman
    Route::delete('/pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy'); // Menghapus halaman
    // menus
    Route::get('/menus/create', [MenuItemController::class, 'create'])->name('menus.create');
    Route::post('/menus', [MenuItemController::class, 'store'])->name('menus.store');
    Route::get('/menus', [MenuItemController::class, 'index'])->name('menus.index');
    Route::post('/menu/update-order', [MenuItemController::class, 'updateOrder'])->name('menu.updateOrder');
    Route::delete('/menu-items/{id}', [MenuItemController::class, 'destroy'])->name('menu-items.destroy');
    Route::patch('/menus/{menu}/update', [MenuItemController::class, 'update'])->name('menus.update');
});
