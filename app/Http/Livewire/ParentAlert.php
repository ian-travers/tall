<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ParentAlert extends Component
{
    protected $listeners = ['passwordChanged'];

    public function passwordChanged()
    {
        session()->flash('status', [
            'type' => 'success',
            'message' => __('Password has been changed.'),
        ]);
    }

    public function render()
    {
        return view('livewire.parent-alert');
    }
}
