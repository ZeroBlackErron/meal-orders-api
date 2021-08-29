<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTokenResource extends JsonResource
{
    public static $wrap = 'user';

    private $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }

    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'last_name' => $this->resource->last_name,
            'email' => $this->resource->email,
        ];
    }

    public function with($request)
    {
        return [
            'token' => $this->token,
        ];
    }
}
