<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RoomsTable extends Component
{
    public $rooms;

    public function __construct(array $rooms)
    {
        $this->rooms = $rooms;
    }

    public function render()
    {
        return view('components.rooms-table', [
            'rooms' => $this->rooms,
        ]);
    }
}