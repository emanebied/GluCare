<?php

namespace App\Http\Requests\Apis\Dashboard;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class RolesUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('role-permissions-edit')){
            return true;
        }
//        return false;
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
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
