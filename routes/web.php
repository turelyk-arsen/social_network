<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChuckNorrisController;

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

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/', [PostController::class, 'home']);

Route::get('/dashboard', [ChuckNorrisController::class, 'getRandomJoke'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/moderator', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('moderator');
Route::get('/posts', [PostController::class, 'indexAll'])->middleware(['auth', 'verified'])->name('posts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/{userId}', [ProfileController::class, 'deleteUser'])->name('profile.deleteUser');
});

// Route::get('/dashboard', [PostController::class, 'userPost']);

Route::get('/chat/{userId}', [ChatController::class, 'index'])->middleware('auth')->name('chat');
Route::post('/chat/send-message', [ChatController::class, 'store'])->middleware('auth');
Route::get('/chat/get-messages', [ChatController::class, 'getMessages'])->middleware('auth')->name('chat.get-messages');


Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::post('/send-email', [EmailController::class, 'sendEmail']);

Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');
// Route::post('/posts/{post}', [CommentController::class, 'index']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy']);
Route::delete('/posts/{post}/delete/delete', [PostController::class, 'des']);
Route::put('/posts/{post}', [PostController::class, 'update']);
// Route::get('/posts/{post}/delete', [PostController::class, 'delete']);

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/comments/{comment}', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/posts/{comment}/edit', [CommentController::class, 'update']);

Route::get('/posts/{post}/comment', [CommentController::class, 'create']);
Route::post('/posts/comment/store', [CommentController::class, 'store']);

Route::delete('/moderator/{post}/delete', [PostController::class, 'dest']);

    
require __DIR__ . '/auth.php';