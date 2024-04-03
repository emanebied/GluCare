<?php

namespace App\Http\Middleware;

use App\Http\traits\ApiTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRoleIsAllowed
{

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user =Auth::guard('sanctum')->user();
        if (in_array($user->role, $roles)) {
            return $next($request);
        }
          return ApiTrait::errorMessage(['role'=>'You do not have permission to access.'],'Unauthorized',401);
    }
}

