<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsSgtteMidleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('SisTAO')['profileType'] == 2) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
