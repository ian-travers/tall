<?php

namespace Tests\Feature\User;

use App\Http\Livewire\User\ProfileForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_update_own_profile()
    {
        $this->signIn();

        Livewire::test(ProfileForm::class)
            ->set('username', 'NEED4FUN')
            ->set('email', 'new@mail.com')
            ->set('country', 'AU')
            ->call('submitForm');

        /** @var User $user */
        $user = auth()->user();

        $this->assertEquals('NEED4FUN', $user->username);
        $this->assertEquals('new@mail.com', $user->email);
        $this->assertEquals('AU', $user->country);
    }

    /** @test */
    function username_must_be_unique()
    {
        /** @var User $user */
        $user = User::factory()->create([
            'username' => 'NEED4FUN',
        ]);

        $this->signIn();

        Livewire::test(ProfileForm::class)
            ->set('username', $user->username)
            ->call('submitForm')
            ->assertHasErrors('username');
    }

    /** @test */
    function email_must_be_unique()
    {
        /** @var User $user */
        $user = User::factory()->create([
            'email' => 'NEED4FUN@mail.com',
        ]);

        $this->signIn();

        Livewire::test(ProfileForm::class)
            ->set('email', $user->email)
            ->call('submitForm')
            ->assertHasErrors('email');
    }
}
