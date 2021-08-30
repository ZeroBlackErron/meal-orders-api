<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    public function register(array $userData)
    {
        return (new UserService())->create($userData);
    }

    public function generateToken(User $user)
    {
        $accessToken = $user->createToken('meal-order');

        return $accessToken->plainTextToken;
    }
}
