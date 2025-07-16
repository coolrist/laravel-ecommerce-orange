<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class UserAuthenticate {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $accessRoutes = request()->routeIs('login') || request()->routeIs('user.accessaccount');
        $accessRoutes |= request()->routeIs('register') || request()->routeIs('user.create');
        
        if (!Session::has('user')) {
            return $accessRoutes ? $next($request) : redirect()->route('login');
        } else {
            return $accessRoutes ? redirect()->route('user.logout') : $next($request);
        }
    }
}