<?php

namespace App\Http\traits;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
trait AuthorizeCheckTrait {

    public function authorizeCheck($permission)
    {
        if (!Auth::user()->can($permission)) {
            throw new AccessDeniedHttpException('Admin Only, Unauthorized');
        }
    }
}
