<?php

namespace App\Http\Controllers\Apis\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Dashboard\RolesStoreRequest;
use App\Http\Requests\Apis\Dashboard\RolesUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsController extends Controller
{
  use AuthorizeCheckTrait;
    public function index()
    {
        $this->AuthorizeCheck(  'role-permissions-view');
        $role = Role::all();
        $role->load('permissions'); //$role->permissions;
        return ApiTrait::data(compact('role'),'All roles and permissions');
    }
    public function create(){

        $this->AuthorizeCheck('role-permissions-create');
        $permissions =Permission::select('id','name')->get();
        return ApiTrait::data(compact('permissions'),'You can create role and permissions');
    }


    public function store(RolesStoreRequest $request)
    {
        // Create  role and give it permissions
        $role = Role::create(['name' => $request->role, 'guard_name' => 'web'])->givePermissionTo($request->permissionName);

        $role->load('permissions');  //$role->permissions;

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        return ApiTrait::data(compact('role'), 'Role created successfully with permissions.',201);
    }

//    public function show($id){
//
//        $this->AuthorizeCheck('role-permissions-view');
//
//        $role = Role::findOrFail($id);
//        $role->load('permissions'); //$role->permissions;
//        return ApiTrait::data(compact('role'),'Role and associated permissions fetched successfully.');
//    }

    public function edit($id)
    {
        $this->AuthorizeCheck('role-permissions-edit');

        // Retrieve the specific role by ID, including its current permissions
        $role = Role::with('permissions')->select('id', 'name')->findOrFail($id);

        return ApiTrait::data(compact('role'), 'Role and Permissions fetched successfully.');
    }


//
    public function update(RolesUpdateRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        $permissions = $role->permissionName;

        $role->revokePermissionTo($permissions);
        $role->givePermissionTo($request->permissionName);

        $role->update(['name'=>$request->role]);
        $role=$role->refresh();

        $role->load('permissions'); //$role->permissions;

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        return ApiTrait::data(compact('role'),'Role and associated permissions Updated successfully.');
    }



    public function destroy($id)
    {
        $this->AuthorizeCheck('role-permissions-delete');

        $role = Role::findOrFail($id);

        $permissions = $role->permissionName;
        $role->revokePermissionTo($permissions);

        $role->delete();
        return ApiTrait::successMessage('Role and associated permissions deleted successfully');
    }
}
