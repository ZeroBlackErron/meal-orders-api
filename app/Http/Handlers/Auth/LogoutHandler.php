<?php

namespace App\Http\Handlers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogoutHandler
{
    public function __invoke()
    {
        /** @var User $user */
        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json(null, 204);
    }
}
