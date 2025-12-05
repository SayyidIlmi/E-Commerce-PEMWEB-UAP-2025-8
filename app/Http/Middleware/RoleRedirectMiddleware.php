<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirectMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Redirect ke dashboard sesuai role
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->isSeller()) {
            return redirect()->route('seller.dashboard');
        }

        // Default: member
        if ($user->isMember()) {
            return redirect()->route('member.dashboard');
        }

        // Jika tidak punya role valid → logout dan tolak
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'role' => 'Akun tidak memiliki role valid!'
        ]);
    }
}
