<?php

namespace App\Repositories\V1;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
	public function __construct(User $model)
	{
		parent::__construct($model);
	}

	public function findByPhone(string $phone): ?Model
	{
		return $this->model::where('phone', $phone)->first();
	}
}
