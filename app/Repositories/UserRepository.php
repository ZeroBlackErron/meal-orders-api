<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends ModelRepository
{
    public function make(array $attributes)
    {
        $this->model = User::make($attributes);

        return $this;
    }
}
