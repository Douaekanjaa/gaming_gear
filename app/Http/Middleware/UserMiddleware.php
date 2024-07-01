<?php
// app/Http/Middleware/UserMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || $user->role !== $role) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
