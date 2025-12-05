<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MemberOnly
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isMember()) {
            abort(403, 'Forbidden - Member Only');
        }
        return $next($request);
    }
}
