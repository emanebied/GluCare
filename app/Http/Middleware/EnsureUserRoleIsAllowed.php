<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EnsureUserRoleIsAllowed
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::guard('sanctum')->user();

        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }


        throw new AccessDeniedHttpException('You do not have permission to access this resource. Required roles: '
            . implode(' or ', $roles));

    }
}
