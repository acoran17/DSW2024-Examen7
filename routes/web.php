<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/posts/{id}/read', [PostController::class, 'read'])->name('posts.read');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', 'App\Http\Controllers\PostController')->middleware('auth');
    Route::post('/posts/{post}/vote', [PostController::class, 'vote'])->name('posts.vote')
    ->middleware('auth');
});

require __DIR__.'/auth.php';
