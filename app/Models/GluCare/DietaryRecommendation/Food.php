<?php

namespace App\Models\GluCare\DietaryRecommendation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';

    protected $fillable = [
        'breakfast',
        'lunch',
        'dinner',
        'image',
        'totalCalories',
        'carbohydrates',
        'proteins',
        'fats'
    ];


}
