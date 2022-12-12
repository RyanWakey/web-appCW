<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/' , 'posts');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware(['auth']);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware(['auth']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware(['auth']);
Route::patch('/posts/{post}' , [PostController::class, 'update'])->name('posts.update')->middleware(['auth']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware(['auth']);

Route::get('/posts/{post}/create', [CommentController::class, 'create'])->name('comments.create')->middleware(['auth']);
Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('comments.store')->middleware(['auth']);
Route::get('/posts/{post}/{comment}', [CommentController::class, 'show'])->name('comments.show');
Route::get('/posts/{post}/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit')->middleware(['auth']);
Route::patch('/posts/{post}/{comment}', [CommentController::class, 'update'])->name('comments.update')->middleware(['auth']);
Route::delete('/posts/{post}/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware(['auth']);

Route::get('/userview',[UserController::class, 'show'])->name('users.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
