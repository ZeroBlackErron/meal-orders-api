<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;

class OrderRepository extends ModelRepository
{
    /**
     * @var Order
     */
    protected $model;

    public function make(array $attributes = [])
    {
        $this->model = Order::make($attributes);

        return $this;
    }

    public function associateCustomer(User $user)
    {
        $this->model->fill(['customer_name' => $user->full_name, 'customer_email' => $user->email,]);
        $this->model->customer()->associate($user);

        return $this;
    }

    public function getSumOfMealOrdersPrices()
    {
        return $this->model->mealOrders()->sum('price');
    }
}
