<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserTokenResource;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            /** @var User $user */
            $user = Auth::user();
            $token = $this->service->generateToken($user);

            return UserTokenResource::make($user, $token);
        }

        return response()->json(['message' => __('auth.failed')], 400);
    }
}
