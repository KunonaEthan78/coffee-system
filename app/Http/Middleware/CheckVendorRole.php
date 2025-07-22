<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckVendorRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->hasAnyRole(['wholesaler', 'retailer'])) {
            abort(403, 'Access denied. Wholesaler/retailer role required.');
        }

        return $next($request);
    }
}