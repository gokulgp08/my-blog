<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
});

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
