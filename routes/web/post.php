<?php
use App\Http\Controllers\PostController;
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
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');
Route::middleware(['auth'])->group(function () {
  
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('can:view,post')->name('post.edit');
    Route::delete('/posts/{post}/distroy', [PostController::class, 'distroy'])->name('post.distroy');
    Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('post.update');    

});

