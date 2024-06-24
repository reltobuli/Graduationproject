<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has an 'admin' role
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        // Return a 403 Forbidden response if the user is not authorized
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}

