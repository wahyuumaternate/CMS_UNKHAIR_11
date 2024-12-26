<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Models\Theme;
use Illuminate\Support\Facades\Route;
// use UniSharp\LaravelFilemanager\Lfm;

Route::get('/search-menu', [SearchController::class, 'searchMenu'])->name('search-menu')->middleware('auth');

Route::get('/', [FrontEndController::class, 'index']);

// Route::get('/', function () {
//     $theme = Theme::where('active', true)->first()->path;
//     $data = []; // Data yang diperlukan

//     return view($theme . '.index', compact('data'));
// });

// Daftarkan rute-rute Laravel File Manager secara terpisah
Route::group(['prefix' => 'cms-unkhair-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/galleries', [GalleriesController::class, 'front'])->name('galleries.front');
Route::get('/gallery/{slug}', [GalleriesController::class, 'detail'])->name('gallery.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// 
// Route::get('{slug}', [PageController::class, 'show'])->name('pages.show');
// Route for Pages
Route::get('pages/{slug}', [FrontEndController::class, 'showPage'])->name('pages.show');

// Route for Posts
Route::get('posts/{slug}', [FrontEndController::class, 'showPost'])->name('posts.show');

// Route for Categories
Route::get('categories/{slug}', [FrontEndController::class, 'showCategories'])->name('categories.show');
// Route::get('{slug}', [FrontEndController::class, 'showUrl'])->name('url.show');
// 


require __DIR__.'/auth.php';
require __DIR__.'/backend.php';
