<?php

namespace App\Http\Controllers;

use App\Models\NFSUServer\Ratings;
use App\Models\NFSUServer\RealServerInfo;

class NFSUServerController extends Controller
{
    protected const RANKING_COUNT = 100;

    public function monitor()
    {
        $serverInfo = new RealServerInfo;
        $title = __('Server monitor');

        return view('server.monitor', compact('serverInfo', 'title'));
    }

    public function ratings(string $type)
    {
        try {
            $ratings = new Ratings(config('nfsu-server.path') . '/stat.dat');
        } catch (\Exception $e) {
            return back()->with('status', [
                'type' => 'error',
                'message' => __('Can not connect to the NFSU server live data.')
            ]);
        }

        if ($type == 'overall') {
            $ranking = array_slice($ratings->overall(), 0, self::RANKING_COUNT);
        } elseif ($type == 'circuit') {
            $ranking = array_slice($ratings->circuit(), 0, self::RANKING_COUNT);
        } elseif ($type == 'sprint') {
            $ranking = array_slice($ratings->sprint(), 0, self::RANKING_COUNT);
        } elseif ($type == 'drag') {
            $ranking = array_slice($ratings->drag(), 0, self::RANKING_COUNT);
        } elseif ($type == 'drift') {
            $ranking = array_slice($ratings->drift(), 0, self::RANKING_COUNT);
        } else {
            return back()->with('status', [
                'type' => 'error',
                'message' => __('Invalid ranking type.')
            ]);
        }

        $type = ucfirst($type);

        $title = __('Ranking') . ' | ' . __($type);

        return view('server.ratings', compact('ranking', 'type', 'title',));
    }
}
