<?php

namespace App\Models\GluCare\ActivityRecommendation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityLike extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'activity_id', 'like','favorite_activity'];
}
