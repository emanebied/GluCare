<?php

namespace App\Http\Controllers\Apis\GluCare\DietaryRecommendation;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\DietaryRecommendation\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    use AuthorizeCheckTrait,ApiTrait;

    public function index()
    {
        $this->authorizeCheck('foods_view');
        $foods = Food::all();
        return response()->json($foods);
    }

    public function store(Request $request)
    {
        $this->authorizeCheck('foods_create');
        $food = new Food([
            'breakfast' => $request->get('breakfast'),
            'lunch' => $request->get('lunch'),
            'dinner' => $request->get('dinner'),
            'image' => $request->get('image'),
            'totalCalories' => $request->get('totalCalories'),
            'carbohydrates' => $request->get('carbohydrates'),
            'proteins' => $request->get('proteins'),
            'fats' => $request->get('fats')
        ]);

        $food->save();
        return response()->json($food);
    }


    public function insertMany(Request $request)
    {
        $this->authorizeCheck('foods_create');
        $foods = $request->all();
        $insertedFoods = [];

        foreach ($foods as $foodData) {
            $food = new Food([
                'breakfast' => $request->get('breakfast'),
                'lunch' => $request->get('lunch'),
                'dinner' => $request->get('dinner'),
                'image' => $request->get('image'),
                'totalCalories' => $request->get('totalCalories'),
                'carbohydrates' => $request->get('carbohydrates'),
                'proteins' => $request->get('proteins'),
                'fats' => $request->get('fats')
            ]);

            $food->save();
            $insertedFoods[] = $food;
        }

        return response()->json($insertedFoods);
    }

    public function show($id)
    {
        $this->authorizeCheck('foods_view');
        $food = Food::find($id);
        return response()->json($food);
    }



    public function update(Request $request, $id)
    {
        $this->authorizeCheck('foods_edit');
        $food = Food::find($id);
        $food->breakfast = $request->get('breakfast');
        $food->lunch = $request->get('lunch');
        $food->dinner = $request->get('dinner');
        $food->image = $request->get('image');
        $food->totalCalories = $request->get('totalCalories');
        $food->carbohydrates = $request->get('carbohydrates');
        $food->proteins = $request->get('proteins');
        $food->fats = $request->get('fats');
        $food->save();
        return response()->json($food);
    }



    public function destroy($id)
    {
        $this->authorizeCheck('foods_delete');
        $food = Food::find($id);
        $food->delete();
        return response()->json($food);
    }

}
