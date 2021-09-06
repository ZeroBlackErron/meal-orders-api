<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserTokenResource;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function __invoke(RegisterRequest $request)
    {
        $user = $this->service->register($request->validated());
        Auth::login($user);
        $token = $this->service->generateToken($user);

        return UserTokenResource::make($user, $token);
    }
}
