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
                'status' => 'active',
                'device_name' => 'iphone',
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@employee.com',
                'password' => 'employee@1234',
                'role' => 'employee',
                'status' => 'active',
                'device_name' => 'iphone',
            ],
            [
                'name' => 'Doctor',
                'email' => 'doctor@doctor.com',
                'password' => 'doctor@1234',
                'role' => 'doctor',
                'status' => 'active',
                'device_name' => 'iphone',
                'experience_years' => 5,
                'qualifications' => 'MD, MBBS',
                'specialization' => 'Cardiology',
                'amount' => 100,
                'currency' => 'USD',
                 'availabilities' => [
                    '2024-04-30 16:23',
                    '2024-05-01 16:25',
                 ],
            ],

        ];

        // Create or update users and assign roles
        foreach ($users as $userData) {
            $user = User::firstOrCreate(['email' => $userData['email']], [
                'name' => $userData['name'],
                'password' => Hash::make($userData['password']),
                'device_name' => $userData['device_name'],
                'role' => $userData['role'],
                'experience_years' => $userData['experience_years'] ?? null,
                'qualifications' => $userData['qualifications'] ?? null,
                'specialization' => $userData['specialization'] ?? null,
                'amount' => $userData['amount'] ?? null,
                'currency' => $userData['currency'] ?? null,
                'availabilities' => $userData['availabilities'] ?? null,
            ]);

            // Assign role to user
            $user->assignRole($userData['role']);

        }
    }

    }

