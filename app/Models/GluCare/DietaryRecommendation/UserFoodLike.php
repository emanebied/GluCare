<?php

namespace App\Models\GluCare\DietaryRecommendation;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFoodLike extends Model
{
    use HasFactory;

    protected $table = 'user_food_likes';

    protected $fillable = [
        'user_id',
        'food_id',
        'like_status',
        'favorite_food'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }




}
