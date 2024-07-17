<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;


Route::get('/',[LandingPageController::class,'index'])->name('landing-page');
Route::get('/matches',[LandingPageController::class,'matches'])->name('matches');

Route::get('players', [LandingPageController::class, 'players'])->name('players');
Route::get('blog', [LandingPageController::class, 'blog'])->name('blog');

Route::get('contact', [LandingPageController::class, 'contact'])->name('contact');