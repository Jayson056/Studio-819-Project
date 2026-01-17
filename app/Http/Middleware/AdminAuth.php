<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and has role admin
        if (!Auth::check() || Auth::user()->role->role_name !== 'admin') {
            return redirect()->route('admin.login')->with('error', 'Please login as admin first.');
        }

        return $next($request);
    }
}
