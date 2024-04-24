<?php

namespace Database\Seeders;
use App\Models\website\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{

    public function run()
    {


        WebsiteSetting::create([
            'name' => 'GluCare',
            'email' => 'glucare@gmail.com',
            'description'=>'A website for diabetics offering information,resources, and support tailored to individuals living with diabetes',
            'image' => 'https://glucare.com/images/logo.png',
            'facebook_link' => 'https://www.facebook.com/GluCare',
            'twitter_link' => 'https://twitter.com/GluCare',
           'instagram_link'=>'https://www.instagram.com/GluCare',
        ]);

    }
}
