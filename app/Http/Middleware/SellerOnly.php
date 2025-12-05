<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SellerOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user || !$user->isSeller()) {
            // Bisa redirect ke member dashboard atau home
            return redirect()->route('member.dashboard')->withErrors('Anda bukan seller atau toko belum terverifikasi.');
        }

        return $next($request);
    }
}