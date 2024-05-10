<?php

namespace App\Http\Controllers\Apis\Dashboard\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Dashboard\UsersManagement\UserStoreRequest;
use App\Http\Requests\Apis\Dashboard\UsersManagement\UserUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use AuthorizeCheckTrait;

    public function index()
    {
        $this->AuthorizeCheck('users_view');
        $user = User::all();
        return ApiTrait::data(compact('user'), 'All Users');

    }

   public function create(){

       $this->AuthorizeCheck('users_create');
        $roles =Role::select('id','name')->get();
        return ApiTrait::data(compact('roles'),'All Roles');

   }


    public function store(UserStoreRequest $request)
    {
        // Validate role
        $role = Role::where('name', $request->role)->first();
        if (!$role) {
            return ApiTrait::errorMessage(['error' => 'Role not found'], 'Role not found');
        }

        // Encode appointments
        $userData = $request->validated();
        $userData['password'] = Hash::make($request->password);


        // Create user
        $user = User::create($userData);

        return ApiTrait::data(compact('user'), 'User Created successfully');
    }




    public function edit($id){

        $this->AuthorizeCheck('users_edit');
        $user =User::findOrFail($id);
        $roles =Role::select('id','name')->get();
        return ApiTrait::data(compact('user','roles'),'User and Roles');
    }



    public function update(UserUpdateRequest $request, $id)
    {

        $user = User::findOrFail($id);

        $userData = $request->validated();

        // Only update the password if a new one is provided
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
        $user->update($userData);

        return ApiTrait::data(compact('user'), 'User updated successfully');
    }


    public function destroy($id)
    {
        $this->AuthorizeCheck('users_delete');
        $user = User::findOrFail($id);
        $user->delete();
        return ApiTrait::successMessage('User deleted successfully');
    }

    }
