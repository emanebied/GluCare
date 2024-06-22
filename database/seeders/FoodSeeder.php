<?php

namespace Database\Seeders;

use App\Models\GluCare\DietaryRecommendation\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonPath = database_path('seeders/data/foods.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("The file $jsonPath does not exist.");
            return;
        }

        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        if (is_null($data)) {
            $this->command->error("Failed to decode JSON data from $jsonPath.");
            return;
        }

        foreach ($data as $recommendation) {
            Food::create($recommendation);
        }

        $this->command->info("Successfully seeded dietary recommendations from $jsonPath.");
    }

}
