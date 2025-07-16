<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        if (!Session::has('admin')) {
            return request()->routeIs('admin.login') || request()->routeIs('admin.accessaccount') ? $next($request) : redirect()->route('admin.login');
        } else {
            return request()->routeIs('admin.login') || request()->routeIs('admin.accessaccount') ? redirect()->route('admin.logout') : $next($request);
        }
    }
}