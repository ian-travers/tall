<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordForm extends Component
{
    public string $password = '';
    public string $password_confirmation = '';

    protected $listeners = ['changed'];

    protected array $rules = [
        'password' => 'required|min:8|confirmed|regex:/^\S*$/u',
    ];

    public function submitForm()
    {
        $this->validate();

        /** @var User $user */
        $user = auth()->user();

        $user->forceFill(['password' => Hash::make($this->password)])->save();

        $this->emitTo('parent-alert', 'passwordChanged');
        $this->dispatchBrowserEvent('passwordChanged');
    }

    public function render()
    {
        return view('livewire.user.change-password-form');
    }
}
