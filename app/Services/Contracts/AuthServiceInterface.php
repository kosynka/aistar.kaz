<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

interface AuthServiceInterface extends BaseServiceInterface
{
	public function login(array $data): ?Model;

	public function register(array $data): ?Model;

	public function logout(): void;
}
