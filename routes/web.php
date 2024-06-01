<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

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
Route::middleware(['guest:web'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('create', [AuthController::class, 'create'])->name('create');
    Route::post('check', [AuthController::class, 'check'])->name('check');
});
Route::middleware(['auth:web'])->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('createPost/{id?}', [PostController::class, 'createPost'])->name('create_post');
    Route::get('destroy/{id}', [PostController::class, 'destroy'])->name('destroy');
    Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
    Route::get('read/{id}', [PostController::class, 'read'])->name('read');
});