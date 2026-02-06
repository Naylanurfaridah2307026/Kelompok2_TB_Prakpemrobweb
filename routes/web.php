<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RecipeController, AuthController, FavoriteController};


Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/show/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 
    Route::resource('recipes', RecipeController::class)->except(['index', 'show']);

    Route::post('/recipes/{recipe}/favorite', [FavoriteController::class, 'toggle'])->name('recipes.favorite');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');


    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});