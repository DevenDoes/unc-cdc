<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserAcademicsController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\UserShippingController;
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

/**
 * Landing Page
 */
Route::get('/', function () {
    return Inertia\Inertia::render('Landing/Index');
});

/**
 * Login
 */
Route::get('/login', function () {
  return Inertia\Inertia::render('Auth/Login');
})->middleware(['guest'])->name('login');

/**
 * Register
 */
Route::get('/register', function () {
  return Inertia\Inertia::render('Auth/Register');
})->middleware(['guest'])->name('register');

/**
 * Forgot Password
 */
Route::get('/forgot-password', function () {
  return Inertia\Inertia::render('Auth/ForgotPassword');
})->middleware(['guest'])->name('password.request');

/**
 * Password Reset Link Sent
 */
Route::get('/password-reset-sent', function () {
  return Inertia\Inertia::render('Auth/PasswordResetSent');
})->middleware(['guest']);

/**
 * Reset Password
 */
Route::get('/reset-password/{token}', function (Request $request, $token) {
  return Inertia\Inertia::render('Auth/ResetPassword', [
    'email' => $request['email'],
    'token' => $token,
  ]);
})->middleware(['guest'])->name('password.reset');

/**
 * Verify Email
 */
Route::middleware(['auth:sanctum'])->get('/email/verify', function () {
  return Inertia\Inertia::render('Auth/VerifyEmail');
})->name('verification.notice');

/**
 * Dashboard
 */
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/dashboard', function () {
        $user = new \App\Models\User();
        return Inertia\Inertia::render('Portal/NextSteps');
    })->name('dashboard');

/**
 * Next Steps
 */
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/next-steps', function () {
        return \Inertia\Inertia::render('Portal/NextSteps');
    })->name('next.steps');

/**
 * Personal Details
 */
Route::middleware(['auth:sanctum'])
    ->get('/profile/personal-details', [UserDetailsController::class, 'show'])
    ->name('details.personal');
Route::middleware(['auth:sanctum'])
    ->post('/profile/personal-details', [UserDetailsController::class, 'store']);

/**
 * Academic Details
 */
Route::middleware(['auth:sanctum', 'details.personal'])
    ->get('/profile/academic-details', [UserAcademicsController::class, 'show'])
    ->name('details.academic');
Route::middleware(['auth:sanctum', 'details.personal'])
    ->post('/profile/academic-details', [UserAcademicsController::class, 'store']);

/**
 * Shipping Details
 */
Route::middleware(['auth:sanctum', 'details.personal', 'details.academic'])
    ->get('/profile/shipping-details', [UserShippingController::class, 'show'])
    ->name('details.shipping');
Route::middleware(['auth:sanctum', 'details.personal', 'details.academic'])
    ->post('/profile/shipping-details', [UserShippingController::class, 'store']);

/**
 * Schedule
 */
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/schedule', [ScheduleController::class, 'show'])
    ->name('schedule');

/**
 * Resources
 */
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/resources', function() {
        return \Inertia\Inertia::render('Portal/Resources');
    })
    ->name('resources');
