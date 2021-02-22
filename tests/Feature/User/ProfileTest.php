<?php

namespace Tests\Feature\User;

use App\Http\Livewire\User\ProfileForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    // Avatar tests

    /** @test */
    function user_can_add_an_avatar()
    {
        Storage::fake('public');

        /** @var User $user */
        $user = User::factory()->create();
        $this->signIn($user);

        $this->assertNull($user->avatar);

        Livewire::test(ProfileForm::class)
            ->set('username', $user->username)
            ->set('email', $user->email)
            ->set('country', $user->country)
            ->set('avatar', $file = UploadedFile::fake()->image('new.png'))
            ->call('submitForm');

        $user->refresh();

        $this->assertNotNull($user->avatar);
        Storage::disk('public')->assertExists($user->avatar);
    }

    /** @test */
    function user_can_remove_own_avatar()
    {
        Storage::fake('public');

        /** @var User $user */
        $user = User::factory()->create();
        $this->signIn($user);

        Livewire::test(ProfileForm::class)
            ->set('username', $user->username)
            ->set('email', $user->email)
            ->set('country', $user->country)
            ->set('avatar', $file = UploadedFile::fake()->image('new.png'))
            ->call('submitForm');

        $user->refresh();

        $filePath = $user->avatar;

        $this->assertNotNull($filePath);
        Storage::disk('public')->assertExists($filePath);

        Livewire::test(ProfileForm::class)
            ->call('removeAvatar')
            ->assertSee('Removed.');

        $user->refresh();

        $this->assertNull($user->avatar);
        Storage::disk('public')->assertMissing($filePath);
    }

    /** @test */
    function previous_avatar_file_is_removed_when_user_select_an_another_avatar()
    {
        Storage::fake('public');

        /** @var User $user */
        $user = User::factory()->create();
        $this->signIn($user);

        Livewire::test(ProfileForm::class)
            ->set('username', $user->username)
            ->set('email', $user->email)
            ->set('country', $user->country)
            ->set('avatar', $file = UploadedFile::fake()->image('old.png'))
            ->call('submitForm');

        $user->refresh();

        $filePath = $user->avatar;

        Storage::disk('public')->assertExists($filePath);

        Livewire::test(ProfileForm::class)
            ->set('username', $user->username)
            ->set('email', $user->email)
            ->set('country', $user->country)
            ->set('avatar', $file = UploadedFile::fake()->image('new.png'))
            ->call('submitForm');

        $user->refresh();

        Storage::disk('public')->assertMissing($filePath);
        Storage::disk('public')->assertExists($user->avatar);
    }
}
