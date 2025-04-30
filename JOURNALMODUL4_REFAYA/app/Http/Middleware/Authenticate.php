<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        // Add exceptions for the login, register, and homepage routes
        if () {
            return $next($request);
        }

        // If not logged in, redirect to login with a flash message
        if () {
            return redirect()->route()->with();
        }

        return $next($request);
    }
}
