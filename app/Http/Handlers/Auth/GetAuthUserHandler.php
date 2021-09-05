<?php

namespace App\Http\Handlers\Auth;

use App\Http\Resources\Users\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GetAuthUserHandler
{
    public function __invoke()
    {
        /** @var User $user */
        $user = Auth::user();

        return UserResource::make($user);
    }
}
