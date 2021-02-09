<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Livewire\Component;

class LoginForm extends Component
{

    public string $username = '';
    public string $password = '';
    public string $remember = '0';

    public string $message = '';

    protected array $rules = [
        'username' => 'required|min:3|max:15',
        'password' => 'required|min:8',
    ];

    public function updatedUsername()
    {
        $this->validateOnly('username');
    }

    public function updatedPassword()
    {
        $this->validateOnly('password');
    }

    public function submitForm()
    {
        $credentials = $this->validate();

        if (auth()->attempt($credentials)) {
            session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $this->message = __('These credentials do not match our records.');
    }

    public function render()
    {
        return view('livewire.auth.login-form')
            ->layout('components.layouts.auth', [
                'title' => __('Login')
            ]);
    }
}
