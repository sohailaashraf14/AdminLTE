<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role !== $role) {
            return redirect(Auth::user()->role === 'admin' ? '/admin/dashboard' : '/home');
        }
        return $next($request);
    }
}
