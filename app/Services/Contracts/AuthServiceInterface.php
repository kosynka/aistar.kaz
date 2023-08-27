<?php

namespace App\Services\Contracts;

interface AuthServiceInterface extends BaseServiceInterface
{
	public function login(array $data): array;

	public function register(array $data): array;

	public function logout(): void;
}
