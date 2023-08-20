<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $service)
    {}

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $this->service->login($request->validated());

        return $this->result($data);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $this->service->register($request->validated());

        return $this->result($data);
    }

    public function logout(): JsonResponse
    {
        $this->service->logout();

        return $this->result(['message' => __('auth.success.logout')]);
    }
}
