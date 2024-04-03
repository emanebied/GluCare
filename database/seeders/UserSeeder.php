<?php
//
//namespace Database\Seeders;
//
//use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;
//
//class UserSeeder extends Seeder
//{
//
//    public function run()        //Assign roles to users
//    {
//        $user =User::firstOrCreate([
//           'name'=>'Admin',
//            'email'=>'admin@admin.com',
//            'role'=>'admin',
//            'device_name'=>'iphone',
//            'password'=>Hash::make('admin@1234')
//
//        ]);
//
//        //Assign role to admin
//        $user->assignRole('admin');
//
////        ____________________________________________________
//
//        $user =User::firstOrCreate([
//            'name'=>'Employee',
//            'email'=>'employee@employee.com',
//            'role'=>'employee',
//            'device_name'=>'iphone',
//            'password'=>Hash::make('employee@1234')
//
//        ]);
//
//        //Assign role to employee
//        $user->assignRole('employee');
//
////__________________________________________________________
//
//        $user =User::firstOrCreate([
//            'name'=>'Doctor',
//            'email'=>'doctor@doctor.com',
//            'role'=>'doctor',
//            'device_name'=>'iphone',
//            'password'=>Hash::make('doctor@1234')
//
//        ]);
//
//        //Assign role to doctor
//        $user->assignRole('doctor');
//    }
//
//}


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
                'first_name' => 'Admin',
                'last_name'=> 'Test',
                'email' => 'admin@admin.com',
                'password' => 'admin@1234',
                'role' => 'admin',
                'status'=>'active',
                'device_name' => 'iphone',
            ],
            [
                'first_name' => 'Employee',
                'last_name'=> 'Test',
                'email' => 'employee@employee.com',
                'password' => 'employee@1234',
                'role' => 'employee',
                'status'=>'active',
            'device_name' => 'iphone',
            ],
            [
                'first_name' => 'Doctor',
                'last_name'=> 'Test',
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
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'password' => Hash::make($userData['password']),
                'device_name' => $userData['device_name'],
                'role' => $userData['role'],
            ]);

            // Assign role to user
            $user->assignRole($userData['role']);
        }
    }
}

