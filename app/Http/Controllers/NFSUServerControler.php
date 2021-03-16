<?php

namespace App\Http\Controllers;

use App\Models\NFSUServer\RealServerInfo;

class NFSUServerControler extends Controller
{
    public function monitor()
    {
        $serverInfo = new RealServerInfo;
        $title = __('Server monitor');

        return view('server.monitor', compact('serverInfo', 'title'));
    }
}
