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

    Route::get('/settings/account', [App\Http\Controllers\User\AccountController::class, 'show'])
        ->middleware(['auth'])
        ->name('settings.account');

    // Backend
    Route::group([
        'middleware' => ['auth', 'admin'],
        'prefix' => '/a',
        'namespace' => 'Backend',
        'as' => 'admin.'
    ], function () {
        Route::get('', [App\Http\Controllers\Backend\DashboardController::class, 'show'])->name('dashboard');

        Route::get('/tests', [App\Http\Controllers\Backend\Tests\QuestionsController::class, 'index'])->name('tests.questions');
        Route::get('/tests/create', [App\Http\Controllers\Backend\Tests\QuestionsController::class, 'create'])->name('tests.questions.create');
        Route::post('/tests', [App\Http\Controllers\Backend\Tests\QuestionsController::class, 'store'])->name('tests.questions.store');
        Route::get('/tests/{question}/edit', [App\Http\Controllers\Backend\Tests\QuestionsController::class, 'edit'])->name('tests.questions.edit');
        Route::get('/tests/{question}', [App\Http\Controllers\Backend\Tests\QuestionsController::class, 'show'])->name('tests.questions.show');
        Route::patch('/tests/{question}', [App\Http\Controllers\Backend\Tests\QuestionsController::class, 'update'])->name('tests.questions.update');
        Route::delete('/tests/{question}', [App\Http\Controllers\Backend\Tests\QuestionsController::class, 'remove'])->name('tests.questions.delete');

        Route::group([
            'prefix' => '/tests/{question}/answers',
        ], function () {
            Route::get('/create', [App\Http\Controllers\Backend\Tests\AnswersController::class, 'create'])->name('tests.answers.create');
            Route::post('', [App\Http\Controllers\Backend\Tests\AnswersController::class, 'store'])->name('tests.answers.store');
            Route::get('/{answer}/edit', [App\Http\Controllers\Backend\Tests\AnswersController::class, 'edit'])->name('tests.answers.edit');
            Route::patch('/{answer}', [App\Http\Controllers\Backend\Tests\AnswersController::class, 'update'])->name('tests.answers.update');
            Route::delete('/{answer}', [App\Http\Controllers\Backend\Tests\AnswersController::class, 'remove'])->name('tests.answers.delete');
        });
    });

    Route::group(
        [
            'prefix' => 'rules',
            'as' => 'rules.',
        ],
        function () {
            Route::get('', [App\Http\Controllers\RulesController::class, 'show'])->name('show');
            Route::post('', [App\Http\Controllers\RulesController::class, 'check'])->name('check');
        }
    );

    Route::group(
        [
            'prefix' => 'server',
            'as' => 'server.',
        ],
        function () {
            Route::get('monitor', [App\Http\Controllers\NFSUServerControler::class, 'monitor'])->name('monitor');
        }
    );

    Route::get('/tourneys', function () {
        return view('welcome');
    })->name('tourneys');
    Route::get('/stats', function () {
        return view('welcome');
    })->name('stats');
});

