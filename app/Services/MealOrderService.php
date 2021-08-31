<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\Order;
use App\Repositories\MealOrderRepository;

class MealOrderService extends ModelService
{
    public function create(Meal $meal, Order $order)
    {
        $mealOrderData = $meal->replicate(['id']);

        (new MealOrderRepository())->make($mealOrderData->toArray())
            ->associateMeal($meal)
            ->associateOrder($order)
            ->save();
    }
}
