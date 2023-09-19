<?php

use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function () {
    
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');

});


Route::middleware(['role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/user/{user}/role/attach', [UserController::class, 'attach'])->name('user.role.attach');
    Route::put('/user/{user}/role/detach', [UserController::class, 'detach'])->name('user.role.detach');

});

Route::middleware(['auth', 'can:view,user'])->group(function () {
    Route::get('/users/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');
});