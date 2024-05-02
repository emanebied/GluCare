<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

//        \App\Models\User::factory()->count(1)->create();
//        \App\Models\User::factory()->count(1)->doctor()->create();
//        \App\Models\User::factory()->count(1)->admin()->create();
//        \App\Models\User::factory()->count(1)->employee()->create();



        DB::table('website_settings')->delete();
        $this->call([
            PermissionRoleSeeder::class,
            UserSeeder::class,
            WebsiteSettingSeeder::class

        ]);
    }
}
