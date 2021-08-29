<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserTokenResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken('login')->plainTextToken;

            return UserTokenResource::make($user, $token);
        }

        return response()->json(['message' => __('auth.failed')], 400);
    }
}
