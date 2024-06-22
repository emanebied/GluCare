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
                    'comments_create','comments_edit','comments_delete','comments_view','comments_show',
                    'likes_create',
                    'PatientDataOfDiabetes_view','PatientDataOfDiabetes_show',
                    'PatientDataOfDiabetes_create','PatientDataOfDiabetes_show','PatientDataOfDiabetes_edit','PatientDataOfDiabetes_delete',
                    'chat_get_chats','chat_create_chat','chat_get_chat_by_id','chat_send_text_message',
                    'chat_search_user','chat_message_status','chat_user/join_chat','chat_user/leave_chat',
                    'doctors_view','doctors_show',
                    'appointments_create','appointments_view','appointments_edit','appointments_delete',
                    'payment_create',
                    'ask_chatbot',
                    'glucose-readings','age_readings','hypertension_readings','heart-disease-readings','smoking-history-readings','bmi_readings','HbA1c_level_readings',
                    'submit_contact_form',
                    'food_create','food_view','food_edit','food_delete',
                    'PatientDataOfDiabetes_view','recommend','foodByUserId_view'



                ],
                'admin' => [
                    'role-permissions-create', 'role-permissions-view', 'role-permissions-edit', 'role-permissions-delete',
                    'users_create', 'users_view', 'users_edit', 'users_delete',
                    'settings_create', 'settings_view','settings_edit', 'settings_delete',
                    'categories_create', 'categories_view', 'categories_edit', 'categories_delete',
                    'posts_create', 'posts_view','posts_edit', 'posts_delete',
                    'comments_create','comments_edit','comments_delete','comments_view','comments_show',
                    'comments_approve', 'comments_reject',
                    'likes_create',
                    'PatientDataOfDiabetes_view','PatientDataOfDiabetes_create','PatientDataOfDiabetes_show','PatientDataOfDiabetes_edit','PatientDataOfDiabetes_delete',
                    'chat_get_chats','chat_create_chat','chat_get_chat_by_id','chat_send_text_message',
                    'chat_search_user','chat_message_status','chat_user/join_chat','chat_user/leave_chat',
                    'doctors_view','doctors_show',
                    'appointments_create','appointments_view','appointments_edit','appointments_delete',
                    'appointments_approve','appointments_cancel',
                    'payment_create',
                    'ask_chatbot',
                    'glucose-readings','age_readings','hypertension_readings','heart-disease-readings','smoking-history-readings','bmi_readings','HbA1c_level_readings',
                    'today_appointments_reports','money_transfers_reports','total_patients_reports',
                    'submit_contact_form','answer_question_from_contact_form',
                    'foods_create','foods_view','foods_edit','foods_delete',
                    'PatientDataOfDiabetes_view','recommend','foodByUserId_view'



                ],
                'employee' => [
                       'answer_question_from_contact_form'
                ],

                'doctor' => [
                    'chat_get_chats','chat_create_chat','chat_get_chat_by_id','chat_send_text_message',
                    'chat_search_user','chat_message_status','chat_user/join_chat','chat_user/leave_chat',
                    'appointments_approve','appointments_cancel',
                    'glucose-readings','age_readings','hypertension_readings','heart-disease-readings','smoking-history-readings','bmi_readings','HbA1c_level_readings',
                    'today_appointments_reports','money_transfers_reports','total_patients_reports',
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
