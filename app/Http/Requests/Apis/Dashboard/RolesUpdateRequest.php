<?php

namespace App\Http\Requests\Apis\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RolesUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user()->can('role-permissions-edit')){
            return true;
        }
//        return false;
        return abort(403, 'Admin Only, Unauthorizede .');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $role_id= $this->route('role-permissions');
        return [
            'permissionName' => ['required'],
            'permissionName.*' => ['exists:permissions,name'],
            'role' => ['required', 'unique:roles,name'.$role_id, 'max:60'],
        ];
    }
}
