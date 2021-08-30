<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create(array $attributes)
    {
        $user = new User();
        $user->fill($attributes)->save();

        return $user;
    }
}
