<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
    
    Route::get('/admin/posts/', [PostController::class, 'index'])->name('post.index');
    Route::get('/admin/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts/', [PostController::class, 'store'])->name('post.store');
 
});