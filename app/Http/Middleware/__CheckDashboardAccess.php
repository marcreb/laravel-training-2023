<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDashboardAccess
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('dashboard/*')) {
            return $next($request);
        }

        // Redirect to a 404 page or any other action if the user tries to access dashboard-specific files directly
        return abort(404);
    }
}
