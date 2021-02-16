<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ProfileForm extends Component
{
    public string $username = '';

    protected function rules()
    {
        return [
            'username' => 'required|min:3|max:15|regex:/^[A-Za-z0-9_]+$/|unique:users,username,' . auth()->id()
        ];
    }

    public function mount(): \Illuminate\Http\RedirectResponse
    {
        if (auth()->guest()) {
            return back()->withErrors(['auth' => __('You must be logged in.')]);
        }

        $this->username = auth()->user()->username;
    }

    public function updatedUsername()
    {
        $this->validateOnly('username');
    }

    public function submitForm()
    {
        /** @var User $user */
        $user = auth()->user();

        $user->update($this->validate());

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.user.profile-form')
            ->layout('components.layouts.app', [
                'title' => __('Profile')
            ]);
    }
}
