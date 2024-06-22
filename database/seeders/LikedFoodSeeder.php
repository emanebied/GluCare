<?php

namespace Database\Seeders;

use App\Models\GluCare\DietaryRecommendation\UserFoodLike;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikedFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specify the path to your CSV file relative to the database directory
        $filePath = database_path('seeders/data/foodLiked.csv');

        // Open the CSV file
        $file = fopen($filePath, 'r');

        // Read the header row (optional, if your CSV has headers)
        $headers = fgetcsv($file);

        // Initialize an empty array to store the data
        $data = [];

        // Read each row of the CSV file
        while (($row = fgetcsv($file)) !== false) {
            // Ensure the row has the expected number of columns
            if (count($row) < 4) {
                // Log or skip this row if it doesn't have the required columns
                continue;
            }

            // Assuming CSV format: user_id, food_id, like_status, favorite_food
            $user_id = $row[0];
            $food_id = $row[1];
            $like_status = $row[2];
            $favorite_food = $row[3];

            // Check if the user_id exists in the users table
            if (User::where('id', $user_id)->exists()) {
                // Prepare data for insertion
                $data[] = [
                    'user_id' => $user_id,
                    'food_id' => $food_id,
                    'like_status' => $like_status,
                    'favorite_food' => $favorite_food,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            } else {
                // Log or skip this row if user_id doesn't exist
                continue;
            }
        }

        fclose($file);

        // Insert data into the database using Eloquent ORM or DB facade
        UserFoodLike::insert($data);
    }
}
