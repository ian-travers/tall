<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $title = __('Account');

        return view('user.account', compact('user', 'title'));
    }
}
