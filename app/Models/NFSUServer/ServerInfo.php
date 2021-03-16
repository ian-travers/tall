<?php

namespace App\Models\NFSUServer;

trait ServerInfo
{
    protected $ip;
    protected $isOnline;
    protected $playersCount;
    protected $roomsCount;
    protected $onlineTime;
    protected $platform;
    protected $version;
    protected $name;
    protected $banCheaters;
    protected $playersInRaces;
    protected $banNewRooms;
    protected $roomsA = []; // Ranked Circuit
    protected $roomsB = []; // Ranked Sprint
    protected $roomsC = []; // Ranked Drift
    protected $roomsD = []; // Ranked Drag
    protected $roomsE = []; // Unranked Circuit
    protected $roomsF = []; // Unranked Sprint
    protected $roomsG = []; // Unranked Drift
    protected $roomsH = []; // Unranked Drag

    public function ip()
    {
        return $this->ip;
    }

    public function isOnline(): bool
    {
        return $this->isOnline;
    }

    public function playersCount(): int
    {
        return (int)$this->playersCount;
    }

    public function roomsCount(): int
    {
        return (int)$this->roomsCount;
    }

    public function onlineInSeconds(): int
    {
        return (int)$this->onlineTime;
    }

    public function platform(): string
    {
        return $this->platform;
    }

    public function version(): string
    {
        return $this->version;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isBanCheaters(): ?bool
    {
        return ($this->version >= '2') ? (bool)$this->banCheaters : null;
    }

    public function playersInRaces(): ?int
    {
        return ($this->version >= '2') ? (int)$this->playersInRaces : null;
    }

    public function isBanNewRooms(): ?bool
    {
        return ($this->version >= '2') ? (bool)$this->banNewRooms : null;
    }

    public function roomsCircuitRanked(): array
    {
        return $this->roomsA;
    }

    public function roomsSprintRanked(): array
    {
        return $this->roomsB;
    }

    public function roomsDriftRanked(): array
    {
        return $this->roomsC;
    }

    public function roomsDragRanked(): array
    {
        return $this->roomsD;
    }

    public function roomsCircuitUnranked(): array
    {
        return $this->roomsE;
    }

    public function roomsSprintUnranked(): array
    {
        return $this->roomsF;
    }

    public function roomsDriftUnranked(): array
    {
        return $this->roomsG;
    }

    public function roomsDragUnranked(): array
    {
        return $this->roomsH;
    }
}