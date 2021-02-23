<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Avatar extends Component
{
    public string $src = '';

    protected $listeners = ['avatarChanged'];

    public function mount()
    {
        $this->src = Storage::url(auth()->user()->avatar);
    }

    public function avatarChanged()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.user.avatar');
    }
}
