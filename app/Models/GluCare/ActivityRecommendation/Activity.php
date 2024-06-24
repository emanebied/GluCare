<?php

namespace App\Models\GluCare\ActivityRecommendation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['morning', 'noon', 'night', 'image'];
}
