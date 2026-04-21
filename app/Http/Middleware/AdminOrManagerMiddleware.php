<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrManagerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'manager'])) {
            return redirect()->route('employees.index')->with('error', 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}
