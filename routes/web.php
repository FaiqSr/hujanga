<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::get('/login', [SignController::class, 'login'])->name('login');
Route::post('signUp', [SignController::class, 'signUp'])->name('signUp');
