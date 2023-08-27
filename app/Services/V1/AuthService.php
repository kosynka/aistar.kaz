<?php

namespace App\Services\V1;

use App\Http\Resources\User\UserResource;
use App\Repositories\V1\RoleRepository;
use App\Repositories\V1\UserRepository;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\V1\BaseService;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService implements AuthServiceInterface
{
    private RoleRepository $roleRepository;

    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function login(array $data): array
    {
        $user = $this->repository->findByPhone($data['phone']);

        if (isset($user)) {
            if (!Hash::check($data['password'], $user->password)) {
                return $this->result(['message' => __('user.error.wrong-password')], 401);
            }

            $token = $user->createToken(
                name: $user->phone,
                abilities: ['users'],
                expiresAt: now()->addDay(),
                )->plainTextToken;

            return $this->result([
                'token' => $token,
                'user' => new UserResource($user->load('city')),
            ]);
        }
        else {
            return $this->result(
                message: __('user.error.wrong-login'),
                code: 401,
            );
        }
    }

	public function register(array $data): array
    {
        if ($this->repository->findByPhone($data['phone'])) {
            return $this->result(
                message: __('user.error.phone-unavailable'),
                code: 401,
            );
        }

        $data['password'] = Hash::make($data['password']);
        $data['role_id'] = $this->roleRepository->findRole('user')->id;

        $user = $this->repository->store($data);

        $token = $user->createToken($user->phone, ['users'])->plainTextToken;

        return $this->result([
            'token' => $token,
            'user' => new UserResource($user->load('city')),
        ]);
    }

	public function logout(): void
    {
        auth()->user()->tokens()->delete();
    }
}
