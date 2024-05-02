<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        $role = $this->faker->randomElement(['user','doctor']);

        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'role' => $role,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'is_online' => $this->faker->boolean(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'image' => $this->faker->imageUrl(),
            'gender' => $this->faker->randomElement(['female', 'male']),
            'phone' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date(),
        ];

        return $data;
    }

    public function doctor()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'doctor',
                'specialization' => $this->faker->word,
                'experience_years' => $this->faker->numberBetween(1, 30),
                'qualifications' => $this->faker->sentence,
            ];
        });
    }


    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'admin@1234',
                'role' => 'admin',
                'status' => 'active',
            ];
        });
    }
    public function employee()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Employee',
                'email' => 'employee@employee.com',
                'password' => 'employee@1234',
                'role' => 'employee',
                'status' => 'active',
            ];
        });
    }







}
