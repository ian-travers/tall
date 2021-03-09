<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class DeleteAccountForm extends Component
{
    public string $password = '';

    protected array $rules = [
        'password' => 'required|min:8',
    ];

    public function submitForm()
    {
        $this->validate();

        /** @var User $user */
        $user = auth()->user();

        $user->delete();
    }

    public function render()
    {
        return view('livewire.user.delete-account-form');
    }
}
