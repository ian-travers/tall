<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Auth\RegisterForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_can_register_an_account()
    {
        $this->get('/register')
            ->assertSeeLivewire('auth.register-form');

        Livewire::test(RegisterForm::class)
            ->set('username', 'John')
            ->set('email', 'john@example.com')
            ->set('country', 'de')
            ->set('password', 'password')
            ->call('submitForm');

        $this->assertDatabaseCount('users', 1);
    }

    /** @test */
    function it_requires_a_username()
    {
        Livewire::test(RegisterForm::class)
            ->set('email', 'john@example.com')
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['username' => 'required']);

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function a_username_must_be_at_least_3_characters()
    {
        Livewire::test(RegisterForm::class)
            ->set('username', 'Jo')
            ->set('email', 'john@example.com')
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['username' => 'min']);

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function a_username_must_be_less_than_16_characters()
    {
        Livewire::test(RegisterForm::class)
            ->set('username', '1234567890123456')
            ->set('email', 'john@example.com')
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['username' => 'max']);

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function a_username_must_have_no_spaces()
    {
        Livewire::test(RegisterForm::class)
            ->set('username', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['username' => 'regex']);

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function it_requires_an_email()
    {
        Livewire::test(RegisterForm::class)
            ->set('username', 'john')
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'required']);

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function an_email_must_be_valid()
    {
        Livewire::test(RegisterForm::class)
            ->set('username', 'JohnDoe')
            ->set('email', 'john@example')
            ->set('password', 'password')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'email']);

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function it_requires_a_password()
    {
        Livewire::test(RegisterForm::class)
            ->set('username', 'John')
            ->set('email', 'john@example.com')
            ->call('submitForm')
            ->assertHasErrors(['password' => 'required']);

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function a_password_must_be_at_least_8_characters()
    {
        Livewire::test(RegisterForm::class)
            ->set('username', 'John')
            ->set('email', 'john@example.com')
            ->set('password', '1234567')
            ->call('submitForm')
            ->assertHasErrors(['password' => 'min']);

        $this->assertDatabaseCount('users', 0);
    }
}
