<?php

namespace App\Http\Middleware;

use App\Constants\RoleConstant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role_id != RoleConstant::ROLE_ADMIN) {
            return redirect()->route('auth.forbidden');
        }
        return $next($request);
    }
}
