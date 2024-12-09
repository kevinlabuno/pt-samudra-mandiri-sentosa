<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika pengguna belum login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Jika pengguna sudah login, lanjutkan request
        return $next($request);
    }
}
