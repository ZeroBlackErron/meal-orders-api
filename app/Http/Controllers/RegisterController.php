<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserTokenResource;
use App\Services\AuthService;

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
        $token = $this->service->generateToken($user);

        return UserTokenResource::make($user, $token);
    }
}
