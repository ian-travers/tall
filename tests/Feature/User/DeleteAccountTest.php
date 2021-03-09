<?php

namespace Tests\Feature\User;

use App\Http\Livewire\User\DeleteAccountForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_delete_own_account()
    {
        $this->signIn();

        $this->assertDatabaseCount('users', 1);

        Livewire::test(DeleteAccountForm::class)
            ->set('password', 'password')
            ->call('submitForm');

        $this->assertDatabaseCount('users', 0);
    }
}
