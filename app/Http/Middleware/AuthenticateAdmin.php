<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()->is_admin) return response("", 403);
        return $next($request);
    }
}
