<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleSeeder extends Seeder
{

    public function run()
    {

            // Reset cached permissions
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

            // Define permissions for each role
            $rolesPermissions = [
                'user' => [
                    'categories_view',
                    'posts_view',
                    'comments_create','comments_edit','comments_delete',
                    'likes_create',
                    'PatientDataOfDiabetes_create','PatientDataOfDiabetes_show','PatientDataOfDiabetes_edit','PatientDataOfDiabetes_delete',



                ],
                'admin' => [
                    'role-permissions-create', 'role-permissions-view', 'role-permissions-edit', 'role-permissions-delete',
                    'users_create', 'users_view', 'users_edit', 'users_delete',
                    'settings_create', 'settings_view','settings_edit', 'settings_delete',
                    'categories_create', 'categories_view', 'categories_edit', 'categories_delete',
                    'posts_create', 'posts_view','posts_edit', 'posts_delete',
                    'comments_create','comments_edit','comments_delete',
                    'comments_approve', 'comments_reject',
                    'likes_create',
                    'PatientDataOfDiabetes_view','PatientDataOfDiabetes_create','PatientDataOfDiabetes_show','PatientDataOfDiabetes_edit','PatientDataOfDiabetes_delete',


                    'invoices_create', 'invoices_view', 'invoices_edit', 'invoices_delete',
                    'services',
                    'reports_patient', 'reports_doctors',
                    'email_answers'
                ],
                'employee' => [
                    'categories_view', 'categories_show',
                    'posts_view', 'posts_show',
                    'comments_create','comments_edit','comments_delete',
                    'likes_create',


                    'reports_patient', 'reports_doctors',
                    'invoices',
                    'email_answers'
                ],
                'doctor' => [
                    'categories_view', 'categories_show',
                    'posts_view', 'posts_show',
                    'comments_create','comments_edit','comments_delete',
                    'likes_create',


                    'services', 'reports_patient'
                ],
            ];

            foreach ($rolesPermissions as $roleName => $permissions) {
                $role = Role::firstOrCreate(['name' => $roleName]);
                foreach ($permissions as $permissionName) {
                    $permission = Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
                    if (!$role->hasPermissionTo($permission)) {
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }


}
