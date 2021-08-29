<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Models\Meal;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::query()->paginate(10);

        return MealResource::collection($meals);
    }
}
