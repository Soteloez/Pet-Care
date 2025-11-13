<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// REGISTRO
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// CATÁLOGO GENERAL
Route::get('/catalogo', [ProductController::class, 'index'])
    ->name('catalogo');

// (opcional) productos por categoría
Route::get('/categoria/{slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/catalogo', [ProductController::class, 'index'])
    ->name('catalogo');
