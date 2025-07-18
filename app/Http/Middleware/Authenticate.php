<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    
   protected function redirectTo(Request $request): ?string
   {
    if (!$request->expectsJson()){
        return route('login');
    }
    return null;
}
}
