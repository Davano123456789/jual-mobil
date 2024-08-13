<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Ambil user yang sudah login
                $user = Auth::guard($guard)->user();

                // Periksa peran user dan arahkan sesuai dengan peran
                if ($user->role_id == 1) {
                    return redirect('/dashboard'); // Admin ke dashboard
                } else if ($user->role_id == 2) {
                    return redirect('/home'); // Client ke home
                }

                // Tambahkan logika lain jika ada peran berbeda
            }
        }

        return $next($request);
    }
}
