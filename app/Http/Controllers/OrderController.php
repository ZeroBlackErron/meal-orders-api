<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Meal;
use App\Models\User;
use App\Services\OrderService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $pagination = $request->query('pagination', 10);

        $orders = (new UserService())->setModel($user)->getOrders($pagination);

        return OrderResource::collection($orders);
    }

    public function store(CreateOrderRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $meals = Meal::findMany($request->json('meals.*.id'));

        $orderService = (new OrderService())->create($user)
            ->addMeals($meals)
            ->updateAmount();

        $order = $orderService->getModel()->load('mealOrders');

        return OrderResource::make($order);
    }
}
