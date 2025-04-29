<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\FirebaseAuth;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\RefreshFirebaseToken;
use Illuminate\Support\Facades\Route;

Route::middleware([RefreshFirebaseToken::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/about/reynaldi', [HomeController::class, 'aboutReynaldi'])->name('aboutReynaldi');
    Route::get('/about/niefa', [HomeController::class, 'aboutNiefa'])->name('aboutNiefa');
    Route::get('/about/faiq', [HomeController::class, 'aboutFaiq'])->name('aboutFaiq');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
});


Route::middleware([GuestMiddleware::class])->group(function () {
    Route::get('/login', [SignController::class, 'login'])->name('login');
    Route::get('/signin/{accessToken}/{refreshToken}', [SignController::class, 'signIn'])->name('signIn');
    Route::post('signUp', [SignController::class, 'signUp'])->name('signUp');
});

Route::middleware([FirebaseAuth::class])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [SignController::class, 'logout'])->name('logout');
});
