<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserTokenResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $userData = $request->validated();
        $userData['password'] = Hash::make($userData['password']);

        /** @var User $user */
        $user = User::create($userData);
        $token = $user->createToken('login')->plainTextToken;

        return UserTokenResource::make($user, $token);
    }
}
