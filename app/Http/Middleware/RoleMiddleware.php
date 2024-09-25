<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    // 
    public function handle($request, Closure $next, $role)
{
    if (auth()->user()->role !== $role) {
        abort(403, 'Unauthorized');
    }
    return $next($request);
}

}
