<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->can('admin')) {
            return $next($request);
        }

        return back()->with('status', [
            'type' => 'error',
            'message' => __('Not enough rights.'),
        ]);
    }
}
