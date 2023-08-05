<?php

namespace App\Repositories\V1;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
	public function __construct(private Model $model)
    {}

	protected function applyFilter(Builder $query, string $text, array $fields): Builder
    {
        foreach ($fields as $field) {
            $query->orWhere($field, 'like', '%' . $text . '%');
        }

        return $query;
    }

	protected function applyOrder(Builder $query, $params): Builder
    {
        $sort = 'asc';
        if (isset($params['desc']) && $params['desc'] == 1) {
            $sort = 'desc';
        }

        $sortBy = 'id';
        if (isset($params['sort_by'])) {
            $sortBy = $params['sort_by'];
        }

        return $query->orderBy($sortBy, $sort);
    }

	protected function applyPagination(Builder $query, $params)
    {
        return $query->paginate(
			perPage: $params['per_page'] ?? 15,
			columns: $params['columns'] ?? ['*'],
			pageName: $params['pageName'] ?? 'page',
			page: $params['page'] ?? 1
		);
    }

	public function index(array $params): ?Collection
	{
		$query = $this->model->query();

        $query->when(isset($params['has_relations']) && $params['has_relations'] == false, function ($query) {
            foreach($this->model->relationsList() as $relation) {
                $query->doesntHave($relation);
            }
        });

        $query->when(isset($params['filter']), function ($query) use ($params) {
            $this->applyFilter($query, $params['filter'], [
                $this->model->getFilterableRowsNames(),
            ]);
        });

        if (isset($params['per_page']) || isset($params['page'])) {
            $query = $this->applyPagination($query, $params);

            return $query;
        }

        return $query->get();
	}

	public function show(int $id): ?Model
	{
		return $this->model::findOrFail($id);
	}
}
