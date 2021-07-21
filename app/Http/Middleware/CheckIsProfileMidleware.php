<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsProfileMidleware
{
    public function handle(Request $request, Closure $next)
    {
        dd(session('user_data'));
    }
}
