<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Auth\LoginForm;
use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registered_user_may_log_in()
    {
        $user = $this->CreateUser();

        $this->assertDatabaseCount('users', 1);

        $this->get('/login')
            ->assertDontSee('These credentials do not match our records')
            ->assertSeeLivewire('auth.login-form');


        Livewire::test(LoginForm::class)
            ->set('username', $user->username)
            ->set('password', 'password')
            ->call('submitForm')
            ->assertDontSee('These credentials do not match our records');

        /** @var User $loginUser */
        $loginUser = auth()->user();

        $this->assertEquals($user->email, $loginUser->email);
    }

    /** @test */
    function it_requires_a_username()
    {
        Livewire::test(LoginForm::class)
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['username' => 'required']);
    }

    /** @test */
    function username_must_be_less_than_16_characters()
    {
        Livewire::test(LoginForm::class)
            ->set('username', '1234567890123456')
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['username' => 'max']);
    }

    /** @test */
    function it_requires_a_password()
    {
        Livewire::test(LoginForm::class)
            ->set('username', 'Anno')
            ->call('submitForm')
            ->assertHasErrors(['password' => 'required']);
    }

    protected function CreateUser(): User
    {
        return User::create([
            'username' => 'John',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
