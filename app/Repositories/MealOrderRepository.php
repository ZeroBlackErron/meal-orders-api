<?php

namespace App\Repositories;

use App\Models\Meal;
use App\Models\MealOrder;
use App\Models\Order;

class MealOrderRepository extends ModelRepository
{
    /**
     * @var MealOrder
     */
    protected $model;

    public function make(array $attributes)
    {
        $this->model = MealOrder::make($attributes);

        return $this;
    }

    public function associateMeal(Meal $meal)
    {
        $this->model->meal()->associate($meal);

        return $this;
    }

    public function associateOrder(Order $order)
    {
        $this->model->order()->associate($order);

        return $this;
    }
}
