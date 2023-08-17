<?php

namespace App\Services\V1;

use App\Http\Resources\User\UserResource;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\V1\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService implements AuthServiceInterface
{
    public function __construct(private AuthRepositoryInterface $repository)
    {}

    public function login(array $data): ?Model
    {
        $user = $this->repository->findByPhone($data['phone']);

        if (isset($user)) {
            if (!Hash::check($data['password'], $user->password)) {
                return $this->jsonResponse([_('user.error.wrong-password')], 401);
            }

            $token = $user->createToken($user->phone, ['users'])->accessToken;

            return $this->jsonResponse([
                'token' => $token,
                'user' => (new UserResource($user)),
            ]);
        }
        else {
            return $this->jsonResponse([_('user.error.wrong-login')], 401);
        }
    }

	public function register(array $data): ?Model
    {
        $data = $this->repository->register($data);

        return $this->jsonResponse($data);
    }

	public function logout(): void
    {
        auth('api')->logout();
    }
}
