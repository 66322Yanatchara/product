<?php

use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Welcome Page
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Greeting Route
Route::get('/greeting', function () {
    return 'Hello World';
});

// User Routes
//Route::get('/user', [UserController::class, 'index']);

// Dashboard Route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Chirp Resource Routes
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

// Product Resource Routes
Route::resource('products', ProductController::class)
    ->only(['index', 'show'])
    ->middleware(['auth', 'verified']);

// Include Auth Routes
require __DIR__.'/auth.php';
