<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'language'], function () {
    Route::get('/register', App\Http\Livewire\Auth\RegisterForm::class);
});

