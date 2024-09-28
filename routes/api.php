<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    ForgotPasswordController,
    LoginController,
    LogoutController,
    MeController,
    ProfileController,
    RegisterController,
    ResetPasswordController,
};

use App\Http\Controllers\{
    UserController,
};

/** 
 * Auth Routes 
 * */
Route::prefix('auth')->group(function () {
    Route::middleware(['guest'])->group( function () {
        Route::post('/register', RegisterController::class)->name('auth.register');
        Route::post('/login', LoginController::class)->name('auth.login');
        Route::post('/forgot-password', ForgotPasswordController::class)->name('auth.forgot-password');
        Route::post('/reset-password', ResetPasswordController::class)->name('auth.reset-password');
    });
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/me', MeController::class)->name('auth.me');
        Route::put('/profile', ProfileController::class)->name('auth.profile');
        Route::post('/logout', LogoutController::class)->name('auth.logout');
    });
});

/** 
 * Routes Dashboard 
 * */
Route::middleware(['auth:sanctum'])->group( function () {
    Route::apiResource('/users', UserController::class);
});
