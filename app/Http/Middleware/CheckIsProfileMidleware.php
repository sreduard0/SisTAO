<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsProfileMidleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('SisTAO')['profileType'] == 1) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
