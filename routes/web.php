<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

// Routes for landing pages
Route::get('/',[LandingPageController::class,'index'])->name('landing-page');
Route::get('/matches',[LandingPageController::class,'matches'])->name('matches');

Route::get('players', [LandingPageController::class, 'players'])->name('players');
Route::get('blog', [LandingPageController::class, 'blog'])->name('blog');

Route::get('contact', [LandingPageController::class, 'contact'])->name('contact');


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login-form', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('/register-form', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register.form');
    Route::post('/registration', [AdminAuthController::class, 'register'])->name('admin.register');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        Route::get('/moderator',[AdminAuthController::class,'moderator'])->name('moderators');
        Route::post('/add-moderator',[AdminAuthController::class,'addModerator'])->name('add-moderator');
        Route::post('/update-moderator', [ModeratorController::class, 'updateModerator'])->name('update-moderator');

    });
});
