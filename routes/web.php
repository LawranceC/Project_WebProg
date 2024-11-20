<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return app(PageController::class)->login();
})->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/register', [PageController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'createUser'])->middleware('guest');
Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware('auth');