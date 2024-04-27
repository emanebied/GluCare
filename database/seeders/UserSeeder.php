<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        // Define user data
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'admin@1234',
                'role' => 'admin',
                'status'=>'active',
                'device_name' => 'iphone',
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@employee.com',
                'password' => 'employee@1234',
                'role' => 'employee',
                'status'=>'active',
            'device_name' => 'iphone',
            ],
            [
                'name' => 'Doctor',
                'email' => 'doctor@doctor.com',
                'password' => 'doctor@1234',
                'role' => 'doctor',
                'status'=>'active',
                'device_name' => 'iphone',

            ],
        ];

        // Create or update users and assign roles
        foreach ($users as $userData) {
            $user = User::firstOrCreate(['email' => $userData['email']], [
                'name' => $userData['name'],
                'password' => Hash::make($userData['password']),
                'device_name' => $userData['device_name'],
                'role' => $userData['role'],
            ]);

            // Assign role to user
            $user->assignRole($userData['role']);
        }
    }
}

