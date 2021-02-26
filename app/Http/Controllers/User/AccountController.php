<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return view('account', compact('user'));
    }
}
