<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Meal;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderService $orderService)
    {
        $this->service = $orderService;
    }

    public function store(CreateOrderRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $meals = Meal::findMany($request->json('meals.*.id'));

        $orderService = $this->service->create($user)
            ->addMeals($meals)
            ->updateAmount();

        $order = $orderService->getModel()->load('mealOrders');

        return OrderResource::make($order);
    }
}
