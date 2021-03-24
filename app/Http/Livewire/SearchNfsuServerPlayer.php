<?php

namespace App\Http\Livewire;

use App\Models\NFSUServer\Ratings;
use Livewire\Component;

class SearchNfsuServerPlayer extends Component
{
    public string $player = '';

    public function submitForm()
    {
        if(strlen($this->player) >= 3) {
            try {
                $ratings = new Ratings(config('nfsu-server.path') . '/stat.dat');
            } catch (\Exception $e) {
                session()->flash('status', [
                    'type' => 'error',
                    'message' => __('Can not connect to the NFSU server live data.'),
                ]);

                return redirect()->route('server.ratings', 'overall');
            }

            if (empty($playerInfo = $ratings->playerInfo($this->player))) {
                session()->flash('status', [
                    'type' => 'warning',
                    'message' => __('There is no information about ":name".', ['name' => $this->player]),
                ]);

                return redirect()->route('server.ratings', 'overall');
            }

            $this->emitTo('search-result', 'found', ['playerInfo' => $playerInfo]);
        }
    }

    public function render()
    {
        return view('livewire.search-nfsu-server-player');
    }
}
