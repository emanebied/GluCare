<?php

namespace App\Http\Controllers\Apis\GluCare\DietaryRecommendation;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\DietaryRecommendation\UserFoodLike;


class patientRatingFood extends Controller
{
    use AuthorizeCheckTrait,ApiTrait;

    public function getFoodByUserId($userId)
    {
        $this->authorizeCheck('foodByUserId_view');

        try {
            // Validate the userId parameter
            if (empty($userId)) {
                return response()->json([
                    'status' => false,
                    'message' => 'User ID parameter is required.',
                    'data' => null
                ], 400);
            }

            // Query the UserFoodLike records based on user_id
            $foodItems = UserFoodLike::where('user_id', $userId)
                ->select('id', 'user_id', 'food_id', 'like_status', 'favorite_food', 'created_at', 'updated_at')
                ->get();

            return response()->json([
                'status' => true,
                'data' => $foodItems
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error retrieving food items: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }


    }


    }

