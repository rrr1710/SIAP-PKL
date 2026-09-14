<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public / Guest Routes
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/login', function () {
    return Inertia::render('auth/Login');
})->middleware('guest')->name('login');

// OAuth Authentication Routes
Route::get('/auth/google/redirect', [AuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'callback'])->name('auth.google.callback');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::get('/dashboard', function () {
    /** @var User $user */
    $user = Auth::user();

    return Inertia::render('Dashboard', [
        'auth' => [
            'user' => $user,
            'roles' => $user->getRoleNames(),
        ],
    ]);
})->middleware('auth')->name('dashboard');