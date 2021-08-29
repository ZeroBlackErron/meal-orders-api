<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public static $wrap = 'order';

    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'code' => $this->resource->code,
            'amount' => $this->resource->amount,
            'customer_name' => $this->resource->customer_name,
            'customer_email' => $this->resource->customer_email,
            'meal_orders' => MealOrderResource::collection($this->whenLoaded('mealOrders')),
        ];
    }
}
