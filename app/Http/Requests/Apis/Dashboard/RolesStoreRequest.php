<?php

namespace App\Http\Requests\Apis\Dashboard;
use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;


class RolesStoreRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('role-permissions-create')){
            return true;
      }
//        return false;
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }

    public function rules()
    {
        return [
            'permissionName' => ['required'],
            'permissionName.*' => ['exists:permissions,name'],
            'role' => ['required', 'unique:roles,name', 'max:60'],
        ];
    }
}
