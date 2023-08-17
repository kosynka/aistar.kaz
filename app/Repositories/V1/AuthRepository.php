<?php

namespace App\Repositories\V1;

use Illuminate\Database\Eloquent\Model;

class AuthRepository extends BaseRepository
{
	public function login(array $data): ?Model
	{}

	public function register(array $data): ?Model
	{}

	public function findByPhone(string $phone): ?Model
	{}
}
