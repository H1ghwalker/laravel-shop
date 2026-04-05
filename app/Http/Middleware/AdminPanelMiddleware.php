<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    public function handle(Request $request, Closure $next): Response {

        // $user = User::where('is_auth', 1);
        if(auth()->user()->role !== 'admin') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
