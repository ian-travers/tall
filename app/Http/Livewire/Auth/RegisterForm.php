<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Hash;
use Livewire\Component;
use Lukeraymonddowning\Honey\Facades\Honey;
use Lukeraymonddowning\Honey\Traits\WithRecaptcha;

class RegisterForm extends Component
{
    use WithRecaptcha;

    public string $username = '';
    public string $email = '';
    public string $country = '';
    public string $password = '';

    public string $submitMessage = '';

    protected array $rules = [
        'username' => 'required|min:3|max:15|regex:/^[A-Za-z0-9_]+$/|unique:users',
        'email' => 'required|email:filter|unique:users',
        'country' => 'required|min:2|max:2',
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
        // TODO: Check the recaptcha response and create a new user when getting online

        //        $token = $this->recaptchaToken();
        //        $response = Honey::recaptcha()->checkToken($token);
        //        $this->submitMessage = str_replace(',"', ', "', collect($response)->toJson());

        User::create([
            'username' => $this->username,
            'email' => $this->email,
            'country' => $this->country,
            'password' => Hash::make($this->password),
        ]);

        $this->submitMessage = 'OK';
    }

    public function render()
    {
        return view('livewire.auth.register-form', [
            'locale' => app()->getLocale(),
        ])
            ->layout('components.layouts.auth', [
                'title' => __('Register')
            ]);
    }
}
