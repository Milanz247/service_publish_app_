<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckServiceUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's type is equal to 1
            if (Auth::user()->usertype == '1') {
                // User's type is 1, allow access
                return $next($request);

            } else {
                // User's type is not 1, you can redirect or perform any other action
                return redirect()->route('/')->with('error', 'Unauthorized access.');
            }
        }

        // If the user is not authenticated, you may handle it as needed
        return redirect()->route('login');
    }
}
