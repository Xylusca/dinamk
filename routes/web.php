<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\User;
use App\Http\Controllers\DashboardController;

// Página inicial
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
});

// Rotas para convidados
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', Auth\LoginController::class)->name('login.post');

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', Auth\RegisterController::class)->name('register.post');
});

// Rotas autenticadas
Route::middleware('auth')->group(function () {
    Route::post('/logout', Auth\LogoutController::class)->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rotas de usuários
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', User\IndexUserController::class)->name('index');
        Route::get('/create', User\CreateUserController::class)->name('create');
        Route::post('/', User\StoreUserController::class)->name('store');
        Route::get('/{user}/edit', User\EditUserController::class)->name('edit');
        Route::put('/{user}', User\UpdateUserController::class)->name('update');
        Route::delete('/{user}', User\DestroyUserController::class)->name('destroy');
    });
});
