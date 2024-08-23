<?php

use App\Http\Controllers\ProfileController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;
// use UniSharp\LaravelFilemanager\Lfm;

Route::get('/post', function () {
    return view('welcome',[
        'posts'=> Posts::all(),
    ]);
});

// Daftarkan rute-rute Laravel File Manager secara terpisah
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/backend.php';
