<?php

namespace App\Models\NFSUServer;

class FakeServer implements ServerInterface
{
    use ServerInfo;

    public function __construct()
    {
        $this->isOnline = true;
        $this->initialize();
    }

    public function initialize()
    {
        $this->playersCount = 15;
        $this->roomsCount = 8;
        $this->onlineTime = 999;
        $this->platform = 'UNI';
        $this->version = '2';
        $this->name = 'FAKE';
        $this->banCheaters = true;
        $this->playersInRaces = 5;
        $this->banNewRooms = true;
        $this->ip = '1.10.100.99';

        $players = ['newbie', 'oldie'];

        $this->roomsA[] = [
            'type' => 'A',
            'name' => 'FAKE_ROOM',
            'count' => '2',
            'players' => $players
        ];
    }
}