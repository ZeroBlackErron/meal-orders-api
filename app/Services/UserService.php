<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function create($attributes)
    {
        $userRepository = new UserRepository();

        return $userRepository->create($attributes);
    }
}
