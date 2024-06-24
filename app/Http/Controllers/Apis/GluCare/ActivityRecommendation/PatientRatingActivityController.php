<?php

namespace App\Http\Controllers\Apis\GluCare\ActivityRecommendation;

use App\Http\Controllers\Controller;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\ActivityRecommendation\UserActivityLike;

class PatientRatingActivityController extends Controller
{
    use AuthorizeCheckTrait;
    public function getActivityByUserId($userId)
    {
        $this->authorizeCheck('activityByUserId_view');
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
            $activityItems = UserActivityLike::where('user_id', $userId)
                ->select('id', 'user_id', 'activity_id', 'like_status', 'favorite_activity', 'created_at', 'updated_at')
                ->get();

            return response()->json([
                'status' => true,
                'data' =>   $activityItems
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error retrieving activity items: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }


    }
}
