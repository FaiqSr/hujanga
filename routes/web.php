<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'signUp'])->name('signup');
    Route::get('/signin/auth/google/{accessToken}/{refreshToken}', [AuthController::class, 'signInWithGoogle'])->name('signInWithGoogle');
    Route::get('/signin/auth/email/{accessToken}/{refreshToken}', [AuthController::class, 'loginWithEmailAndPassword'])->name('loginWithEmailAndPassword');
});

Route::middleware([FirebaseAuth::class])->group(function () {
    Route::get('/dashboard/map', [DashboardController::class, 'dashboard'])->name('map');
    Route::get('/dashboard/setting', [DashboardController::class, 'setting'])->name('setting');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
