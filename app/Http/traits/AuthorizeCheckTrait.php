<?php

namespace App\Http\traits;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use Spatie\Permission\Traits\HasRoles;

trait AuthorizeCheckTrait
{
    use HasRoles;

    public function authorizeCheck($permissions)
    {
        // Check if the user is not authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

            // Check if the user has any of the specified permissions
            if (Auth::user()->hasAnyPermission($permissions)) {
                return true;
            }


        // User doesn't have the required permissions
        throw new AccessDeniedHttpException('Unauthorized access permission.');
    }
}
