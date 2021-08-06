<?php

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

Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact']);
Route::get('/points', [App\Http\Controllers\PagesController::class, 'points']);
Route::get('/rank', [App\Http\Controllers\PagesController::class, 'rank']);

Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::get('/search', [App\Http\Controllers\PostsController::class, 'search']);
Route::get('/dashsearch', [App\Http\Controllers\DashboardController::class, 'search']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::post('/posts/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'destroy'])->name('posts.likes');

