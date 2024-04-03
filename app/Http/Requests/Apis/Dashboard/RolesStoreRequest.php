<?php

namespace App\Http\Requests\Apis\Dashboard;
use Illuminate\Foundation\Http\FormRequest;


class RolesStoreRequest extends FormRequest
{
    public function authorize()
    {
        if($this->user()->can('role-permissions-create')){
            return true;
      }
//        return false;
        return abort(403, 'Admin Only, Unauthorized .');
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
