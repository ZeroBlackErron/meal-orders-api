<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Meal;
use App\Models\MealOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(CreateOrderRequest $request)
    {
        $user = Auth::user();

        $orderData = [
            'customer_name' => "$user->name $user->last_name",
            'customer_email' => $user->email,
        ];

        $meals = Meal::findMany($request->json('meals.*.id'));

        $orderData['amount'] = $meals->sum('price');

        /** @var Order $order */
        $order = Order::make($orderData);
        $order->customer()->associate($user);
        $order->save();

        $meals->each(function (Meal $meal) use ($order) {
            /** @var MealOrder $mealOrder */
            $mealOrder = MealOrder::make($meal->replicate()->toArray());
            $mealOrder->meal()->associate($meal);
            $mealOrder->order()->associate($order);
            $mealOrder->save();
        });

        $order->load('mealOrders');

        return OrderResource::make($order);
    }
}
