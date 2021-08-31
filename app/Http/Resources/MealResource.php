<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    public static $wrap = 'meal';

    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'photo' => $this->resource->getFirstMediaUrl('photos'),
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'currency' => 'S/.',
            'price' => $this->resource->price,
        ];
    }
}
