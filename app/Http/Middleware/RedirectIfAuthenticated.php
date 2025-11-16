<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (auth($guard)->check()) {
                // Sudah login → arahkan ke dashboard sesuai guard
                return $this->redirectToDashboard($guard);
            }
        }

        return $next($request);
    }

    protected function redirectToDashboard($guard)
    {
        if ($guard === 'web') {
            return redirect()->route('admin.home');
        }

        if ($guard === 'student') {
            return redirect()->route('student.dashboard');
        }

        return redirect('/'); // fallback
    }
}
