<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ProfileForm extends Component
{
    public string $username = '';
    public string $email = '';
    public string $country = '';

    protected function rules()
    {
        return [
            'username' => 'required|min:3|max:15|regex:/^[A-Za-z0-9_]+$/|unique:users,username,' . auth()->id(),
            'email' => 'required|email:filter|unique:users,email,' . auth()->id(),
            'country' => 'required|max:2',
        ];
    }

    public function mount()
    {
        if (auth()->guest()) {
            return back()->withErrors(['auth' => __('You must be logged in.')]);
        }

        /** @var User $user */
        $user = auth()->user();

        $this->username = $user->username;
        $this->email = $user->email;
        $this->country = $user->country;
    }

    public function updatedUsername()
    {
        $this->validateOnly('username');
    }

    public function updatedEmail()
    {
        $this->validateOnly('email');
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
        return view('livewire.user.profile-form', [
            'locale' => app()->getLocale(),
        ])
            ->layout('components.layouts.app', [
                'title' => __('Profile')
            ]);
    }
}
