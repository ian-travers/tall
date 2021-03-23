<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchResult extends Component
{
    public bool $isShow = false;
    public $playerInfo;

    protected $listeners = ['found'];

    public function found(array $playerInfo)
    {
        $this->playerInfo = $playerInfo['playerInfo'];
        $this->isShow = true;
    }


    public function render()
    {
        return view('livewire.search-result', ['playerInfo' => $this->playerInfo]);
    }
}
