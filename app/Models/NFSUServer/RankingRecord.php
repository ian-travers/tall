<?php

namespace App\Models\NFSUServer;

class RankingRecord
{
    public $name;
    public $overall;
    public $circuit;
    public $sprint;
    public $drift;
    public $drag;

    public function __construct()
    {
        $this->overall = new ModeInformation;
        $this->circuit = new ModeInformation;
        $this->sprint = new ModeInformation;
        $this->drift = new ModeInformation;
        $this->drag = new ModeInformation;
    }

    public function populateMode(string $mode, string $data, int $offset): void
    {
        $this->$mode->wins = hexdec(Helper::str2Hex(substr($data, $offset, 4)));
        $this->$mode->REP = hexdec(Helper::str2Hex(substr($data, $offset + 12, 4)));
        $this->$mode->loses = hexdec(Helper::str2Hex(substr($data, $offset + 4, 4)));
        $this->$mode->winsPercent = (hexdec(Helper::str2Hex(substr($data, $offset, 4)))
            + hexdec(Helper::str2Hex(substr($data, $offset + 4, 4)))
            + hexdec(Helper::str2Hex(substr($data, $offset + 8, 4)))) == 0
            ? '0%' :
            round((hexdec(Helper::str2Hex(substr($data, $offset, 4))))
                / (hexdec(Helper::str2Hex(substr($data, $offset, 4)))
                    + hexdec(Helper::str2Hex(substr($data, $offset + 4, 4)))
                    + hexdec(Helper::str2Hex(substr($data, $offset + 8, 4))))
                * 100) . '%';
        $this->$mode->discPercent = (hexdec(Helper::str2Hex(substr($data, $offset, 4)))
            + hexdec(Helper::str2Hex(substr($data, $offset + 4, 4)))
            + hexdec(Helper::str2Hex(substr($data, $offset + 8, 4)))) == 0
            ? '0%' :
            round((hexdec(Helper::str2Hex(substr($data, $offset + 8, 4))))
                / (hexdec(Helper::str2Hex(substr($data, $offset, 4)))
                    + hexdec(Helper::str2Hex(substr($data, $offset + 4, 4)))
                    + hexdec(Helper::str2Hex(substr($data, $offset + 8, 4))))
                * 100) . '%';
        $this->$mode->avgOppsREP = hexdec(Helper::str2Hex(substr($data, $offset + 16, 4)));
        $this->$mode->avgOppsRating = hexdec(Helper::str2Hex(substr($data, $offset + 20, 4)));
    }
}