<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleOrPermissionMiddleware
{
    public function handle($request, Closure $next, ...$rolesOrPermissions)
    {
        foreach ($rolesOrPermissions as $roleOrPermission) {
            if (Auth::check() && Auth::user()->hasRole($roleOrPermission)) {
                return $next($request);
            }
            if (Auth::check() && Auth::user()->hasPermissionTo($roleOrPermission)) {
                return $next($request);
            }
        }

        return abort(403, 'Unauthorized.');
    }
}
