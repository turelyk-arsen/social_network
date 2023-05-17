<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

/*add post button */
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

// Display all posts
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

// Create a new post
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');

// Update an existing post
Route::put('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

// Delete a post
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');

// Display the create post form
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

//Show
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

//Edite
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');






require __DIR__.'/auth.php';