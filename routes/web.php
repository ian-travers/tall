<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'language'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('root');

    // Auth
    Route::get('/register', App\Http\Livewire\Auth\RegisterForm::class)
        ->middleware('guest')
        ->name('register');

    Route::get('/login', App\Http\Livewire\Auth\LoginForm::class)
        ->middleware(['guest'])
        ->name('login');

    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->middleware(['auth'])
        ->name('logout');

    Route::get('/forgot-password', [App\Http\Controllers\Auth\PasswordResetController::class, 'create'])
        ->middleware(['guest'])
        ->name('password.request');
    Route::post('/forgot-password', [App\Http\Controllers\Auth\PasswordResetController::class, 'store'])
        ->middleware(['guest'])
        ->name('password.email');
    Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\NewPasswordController::class, 'create'])
        ->middleware('guest')
        ->name('password.reset');
    Route::post('/reset-password', [App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.update');

    // User settings
    Route::get('/settings/profile', App\Http\Livewire\User\ProfileForm::class)
        ->middleware(['auth'])
        ->name('settings.profile');

    Route::get('/tourneys', function () {
        return view('welcome');
    })->name('tourneys');
    Route::get('/stats', function () {
        return view('welcome');
    })->name('stats');
});

