<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia\Inertia::render('Landing/Index');
});

/**
 * Custom Auth Routes
 */
Route::get('/login', function () {
  return Inertia\Inertia::render('Auth/Login');
})->middleware(['guest'])->name('login');

Route::get('/register', function () {
  return Inertia\Inertia::render('Auth/Register');
})->middleware(['guest'])->name('register');

Route::get('/forgot-password', function () {
  return Inertia\Inertia::render('Auth/ForgotPassword');
})->middleware(['guest'])->name('password.request');

Route::get('/password-reset-sent', function () {
  return Inertia\Inertia::render('Auth/PasswordResetSent');
})->middleware(['guest']);

Route::get('/reset-password/{token}', function (Request $request, $token) {
  return Inertia\Inertia::render('Auth/ResetPassword', [
    'email' => $request['email'],
    'token' => $token,
  ]);
})->middleware(['guest'])->name('password.reset');

Route::middleware(['auth:sanctum'])->get('/email/verify', function () {
  return Inertia\Inertia::render('Auth/VerifyEmail');
})->name('verification.notice');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
