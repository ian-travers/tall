<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class RegisterForm extends Component
{
    public string $username = '';
    public string $email = '';
    public string $password = '';

    public string $submitMessage = '';

    protected array $rules = [
        'username' => 'required|min:3|max:15|regex:/^[A-Za-z0-9_]+$/|unique:users|',
        'email' => 'required|email:filter|unique:users',
        'password' => 'required|min:8|regex:/^\S*$/u',
    ];

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
        $this->validate();

//        $token = $this->recaptchaToken();
//        $response = Honey::recaptcha()->checkToken($token);


        $this->submitMessage = 'Ok';
    }
    public function render()
    {
        return view('livewire.auth.register-form')
            ->layout('components.layouts.auth', [
                'title' => __('Register')
            ]);
    }
}
