<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $service)
    {}

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $this->service->login($request->validated());

        return response()->json(
            (new UserResource($data)),
        );
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $this->service->register($request->validated());

        return response()->json($data);
    }

    public function logout(): JsonResponse
    {
        $data = $this->service->logout();

        return response()->json([
            'status' => 'ok',
            'message' => $data ? __('auth.success.logout') : __('auth.error.logout'),
        ]);
    }
}
