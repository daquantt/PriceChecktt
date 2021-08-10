<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact']);
Route::get('/points', [App\Http\Controllers\PagesController::class, 'points']);

Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::get('/search', [App\Http\Controllers\PostsController::class, 'search']);

Route::get('/rank', [App\Http\Controllers\UserPostController::class, 'rank']);
Route::get('/users/{user:username}/posts', [App\Http\Controllers\UserPostController::class, 'index'])->name('users.posts');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware(['verified']);
Route::get('/dashsearch', [App\Http\Controllers\DashboardController::class, 'search']);

Route::post('/posts/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'destroy'])->name('posts.likes');


