<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'language'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('root');

    Route::get('/register', App\Http\Livewire\Auth\RegisterForm::class)->name('register');

    Route::get('/login', App\Http\Livewire\Auth\LoginForm::class)
        ->middleware(['guest'])
        ->name('login');
});

