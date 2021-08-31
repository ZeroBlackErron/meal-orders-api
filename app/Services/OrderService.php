<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\Order;
use App\Models\User;
use App\Repositories\OrderRepository;
use Illuminate\Support\Collection;

class OrderService extends ModelService
{
    /**
     * @var Order
     */
    protected $model;

    public function create(User $user)
    {
        $order = (new OrderRepository())->make()
            ->associateCustomer($user)
            ->save();

        $this->setModel($order);

        return $this;
    }

    public function addMeals(Collection $meals)
    {
        $meals->each(function (Meal $meal) {
            $this->addMeal($meal);
        });

        return $this;
    }

    public function addMeal(Meal $meal)
    {
        (new MealOrderService())->create($meal, $this->model);

        return $this;
    }

    public function updateAmount()
    {
        $orderRepository = new OrderRepository();
        $orderRepository->setModel($this->getModel());

        $updatedAmount = $orderRepository->getSumOfMealOrdersPrices();
        $orderRepository->update(['amount' => $updatedAmount]);

        return $this;
    }
}
