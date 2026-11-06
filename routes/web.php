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

// Arahkan otomatis ke halaman buku (akan dicegat ke halaman login jika belum autentikasi)
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Semua rute di dalam grup ini wajib login
Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        return redirect()->route('books.index'); // Gua arahin juga ke books biar nggak balik ke welcome
    });

    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('members', MemberController::class);
    
});