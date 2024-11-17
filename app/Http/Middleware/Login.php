<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Login
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        // Proceed to the next request if authenticated
        return $next($request);
    }
}
