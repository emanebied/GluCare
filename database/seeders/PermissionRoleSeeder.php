<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            // Reset cached permissions
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

            // Define permissions for each role
            $rolesPermissions = [
                'user' => ['services'],
                'admin' => [
                    'role-permissions-create', 'role-permissions-view', 'role-permissions-edit', 'role-permissions-delete',
                    'users_create', 'users_view', 'users_edit', 'users_delete',
                    'settings_create', 'settings_view', 'settings_edit', 'settings_delete',
                    'invoices_create', 'invoices_view', 'invoices_edit', 'invoices_delete',
                    'services',
                    'reports_patient', 'reports_doctors',
                    'email_answers'
                ],
                'employee' => [
                    'reports_patient', 'reports_doctors',
                    'invoices',
                    'email_answers'
                ],
                'doctor' => [
                    'services', 'reports_patient'
                ],
            ];

            foreach ($rolesPermissions as $roleName => $permissions) {
                // Create or retrieve role
                $role = Role::firstOrCreate(['name' => $roleName]);

                // Assign permissions to role
                foreach ($permissions as $permissionName) {
                    // Find or create the permission
                    $permission = Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);

                    // Check if the role already has this permission
                    if (!$role->hasPermissionTo($permission)) {
                        // Assign permission to role
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }


}
