<?php

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

Route::get('/', function () {
    return view('index');
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    // Route::get('dashboard', [App\Http\Controllers\DashboardController::class,'join'])->name('join');
    Route::resource('books',App\Http\Controllers\BookController::class);
    Route::resource('book_recommendations',App\Http\Controllers\BookRecommendationController::class);
    // Route::post('dashboard', [App\Http\Controllers\DashboardController::class,'search'])->name('search');
    Route::resource('profiles', App\Http\Controllers\ProfileController::class);
    Route::resource('book_reviews', App\Http\Controllers\BookReviewController::class);
    Route::get('logout', [App\Http\Controllers\DashboardController::class,'logout'])->name('logout');
});

Route::get('/register',[App\Http\Controllers\RegistrationController::class,'create'])->name('register');
Route::post('/register',[App\Http\Controllers\RegistrationController::class,'store']);
Route::get('/login',[App\Http\Controllers\LoginController::class,'create'])->name('login');
Route::post('/login',[App\Http\Controllers\LoginController::class,'store'])->name('login');
