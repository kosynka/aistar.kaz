<?php

namespace App\Repositories\V1;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class RoleRepository extends BaseRepository
{
	public function __construct(Role $model)
	{
		parent::__construct($model);
	}

	public function findRole(string $name): ?Model
	{
		return $this->model::where('name', $name)->first();
	}
}
