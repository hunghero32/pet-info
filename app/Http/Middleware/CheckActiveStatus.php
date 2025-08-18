<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckActiveStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->active && !$request->routeIs('account.locked')) {
            return redirect()->route('account.locked');
        }

        return $next($request);
    }
}
