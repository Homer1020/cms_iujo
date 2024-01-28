<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about', [PagesController::class, 'about'])->name('about');

Route::prefix('dashboard')->group(function() {
    Route::resource('blog', PostController::class)
        ->parameter('blog', 'post')
        ->except([
            'show'
        ]);
});
Route::get('blog', [PostController::class, 'publicIndex'])->name('blog.publicIndex');
Route::get('blog/{post}', [PostController::class, 'show'])->name('blog.show');

Route::prefix('dashboard')->group(function() {
    Route::resource('categories', CategoriesController::class);
});

// Route::prefix('dashboard')->group(function() {
//     Route::get('about', [PagesController::class, 'about']);
// });