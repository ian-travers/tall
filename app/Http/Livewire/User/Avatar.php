<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Avatar extends Component
{
    public string $avatarPath = '';
    public bool $hasAvatar = false;

    protected $listeners = ['avatarChanged'];

    public function mount()
    {
        $this->hasAvatar = auth()->user()->hasAvatar();
        $this->avatarPath = Storage::url(auth()->user()->avatar);
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
