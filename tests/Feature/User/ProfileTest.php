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
            ->call('submitForm');

        $this->assertEquals('NEED4FUN', auth()->user()->username);
    }

    /** @test */
    function username_must_always_be_unique()
    {
        $user = User::factory()->create();

        $this->signIn($user);

        Livewire::test(ProfileForm::class)
            ->set('username', $user->username)
            ->call('submitForm')
            ->assertHasNoErrors('username');
    }
}
