<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class RegisterForm extends Component
{

    public function render()
    {
        return view('livewire.auth.register-form')
            ->layout('components.layouts.auth', [
                'title' => __('Register')
            ]);
    }
}
