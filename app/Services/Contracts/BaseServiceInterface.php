<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseServiceInterface
{
	public function index(array $params): ?Collection;

	public function show(int $id): ?Model;
}
