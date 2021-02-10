<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function authenticated_user_may_log_out()
    {
        $user = User::create([
            'username' => 'John',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);

        auth()->login($user);

        $this->assertTrue(auth()->check());

        $this->post('/logout')
            ->assertRedirect('/');

        $this->assertFalse(auth()->check());
    }

    /** @test */
    function user_must_be_logged_in_before_log_out()
    {
        $this->assertTrue(auth()->guest());

        $this->post('/logout')
            ->assertRedirect('/login');
    }
}
