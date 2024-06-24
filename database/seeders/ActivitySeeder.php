<?php

namespace Database\Seeders;

use App\Models\GluCare\ActivityRecommendation\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonPath = database_path('seeders/data/activities.json');

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
          Activity ::create($recommendation);
        }

        $this->command->info("Successfully seeded dietary recommendations from $jsonPath.");
    }

}
