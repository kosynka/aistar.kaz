<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface AuthRepositoryInterface extends BaseRepositoryInterface
{
	public function login(array $data): ?Model;

	public function register(array $data): ?Model;

	public function findByPhone(string $phone): ?Model;
}
