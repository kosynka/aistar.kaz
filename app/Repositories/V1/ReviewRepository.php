<?php

namespace App\Repositories\V1;

use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewRepository extends BaseRepository
{
	public function __construct(Review $model)
	{
		parent::__construct($model);
	}

	public function index(array $params): LengthAwarePaginator
	{
		$query = $this->model->with([
			'user',
			'product',
		]);

		$query->where('product_id', $params['product_id']);

		$query->where('user_id', auth('api')->user()->id);

        $query->when(isset($params['filter']), function ($query) use ($params) {
            $this->applyFilter($query, $params['filter'], [
                $this->model->getFilterableRowsNames(),
            ]);
        });

        $data = $this->applyPagination($query, $params);

        return $data;
	}
}
