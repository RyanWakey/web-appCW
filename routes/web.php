<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Livewire\PostComment;
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

Route::post('/posts/{post}', [PostComment::class, 'saveComment'])->middleware(['auth']);
Route::get('/posts/{post}/create', [CommentController::class, 'create'])->name('comments.create')->middleware(['auth']);
Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comments.store')->middleware(['auth']);
Route::get('/posts/{post}/{comment}', [CommentController::class, 'show'])->name('comments.show');
Route::get('/posts/{post}/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit')->middleware(['auth']);
Route::patch('/posts/{post}/{comment}', [CommentController::class, 'update'])->name('comments.update')->middleware(['auth']);
Route::delete('/posts/{post}/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware(['auth']);


Route::get('/userview/{user}',[UserController::class, 'show'])->name('users.show');

Route::post('/posts/{post}/Postlike',[LikeController::class, 'likePost'])->name('likes.likePost');
Route::post('/posts/{comment}/CommentLike',[LikeController::class, 'likeComment'])->name('likes.likeComment');

Route::get('/userprofile/create', [UserProfileController::class, 'create'])->name('userprofiles.create');
Route::post('userprofile', [UserProfileController::class, 'store'])->name('userprofiles.store'); 
Route::get('/userprofile/{profile}', [UserProfileController::class, 'show'])->name('userprofiles.show');
Route::get('/userprofile/{profile}/edit', [UserProfileController::class, 'edit'])->name('userprofiles.edit');
Route::patch('/userprofile/{profile}', [UserProfileController::class, 'update'])->name('userprofiles.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
