<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;
    
            if ($userRole == 'admin' && $role == 'admin') {
                return $next($request);
            } elseif ($userRole == 'user' && $role == 'user') {
                return $next($request);
            }
        }
    
        return redirect('/');
    }
    
}
