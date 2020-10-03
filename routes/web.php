<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TeamProjectController;
use App\Http\Controllers\UserAcademicsController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserShippingController;
use App\Models\Schedule;
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
    $schedule = Schedule::all();
    return Inertia\Inertia::render('Landing/Index', [
        'schedule' => $schedule,
    ]);
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
        \Illuminate\Support\Facades\Redirect::route('schedule');
    })->name('dashboard');

/**
 * Next Steps
 */
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/next-steps', function () {
        \Illuminate\Support\Facades\Redirect::route('schedule');
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

/**
 * Profile
 */
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/user/profiles', [UserProfileController::class, 'index'])
    ->name('profile.index');
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/user/profile/{user}', [UserProfileController::class, 'show'])
    ->name('profile.show');
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/user/profile/{user}/edit', [UserProfileController::class, 'edit'])
    ->name('profile.edit');
Route::middleware(['auth:sanctum', 'registered'])
    ->put('/user/profile/personal', [UserProfileController::class, 'updatePersonal']);
Route::middleware(['auth:sanctum', 'registered'])
    ->put('/user/profile/about', [UserProfileController::class, 'updateAbout']);
Route::middleware(['auth:sanctum', 'registered'])
    ->put('/user/profile/social', [UserProfileController::class, 'updateSocial']);
Route::middleware(['auth:sanctum', 'registered'])
    ->put('/user/profile/academics', [UserProfileController::class, 'updateAcademics']);

/**
 * Teams
 */
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/teams/create', [TeamController::class, 'create'])
    ->name('teams.create');
Route::middleware(['auth:sanctum', 'registered'])
    ->post('/teams/create', [TeamController::class, 'store'])
    ->name('teams.store');
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/teams/{team}', [TeamController::class, 'show'])
    ->name('teams.show');
Route::middleware(['auth:sanctum', 'registered'])
    ->get('/teams/{team}/edit', [TeamController::class, 'edit'])
    ->name('teams.edit');
Route::middleware(['auth:sanctum', 'registered'])
    ->put('/teams/{team}', [TeamProjectController::class, 'update'])
    ->name('teams.project.update');
Route::middleware(['auth:sanctum', 'registered'])
    ->post('/teams/{team}/member', [TeamMemberController::class, 'store'])
    ->name('teams.member.store');
