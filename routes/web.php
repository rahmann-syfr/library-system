<?php

use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Halaman utama (landing page) ditaruh di luar agar bisa diakses tanpa login
Route::get('/', function () {
    return view('welcome');
});

// Semua rute di dalam grup ini wajib login
Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('welcome');
    });

    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('members', MemberController::class);
    
});