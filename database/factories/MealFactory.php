<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition()
    {
        return [
            'name' => Str::ucfirst((string)$this->faker->words(2, true)),
            'description' => $this->faker->text(191),
            'price' => $this->faker->randomFloat(2, 0, 50),
        ];
    }
}
