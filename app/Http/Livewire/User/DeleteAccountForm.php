<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class DeleteAccountForm extends Component
{
    public string $email = '';
    public string $phrase = '';

    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'in:' . auth()->user()->email],
            'phrase' => 'required|regex:/delete my account right now/',
        ];
    }

    protected function messages()
    {
        return [
            'email.in' => __('You must provide your email address.'),
            'phrase.regex' => __('You must repeat the verify phrase exactly'),
        ];
    }

    protected $validationAttributes = [
        'phrase' => 'verify phrase'
    ];

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function updatedPhrase()
    {
        $this->validateOnly('phrase');
    }

    public function submitForm()
    {
        $this->validate();

        /** @var User $user */
        $user = auth()->user();

        $user->delete();

        $this->dispatchBrowserEvent('modalSubmitted');

        // TODO: flash message
        return redirect()->route('root');
    }

    public function render()
    {
        return view('livewire.user.delete-account-form');
    }
}
