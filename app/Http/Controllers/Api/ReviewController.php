<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\IndexRequest;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Services\V1\ReviewService;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function __construct(private ReviewService $service)
    {}

    public function index(int $productId, IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index(array_merge(
            $request->validated(),
            ['product_id' => $productId],
        ));

        return response()->json(
            (new ReviewCollection($paginatedData)),
        );
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new ReviewResource($data)],
        );
    }

    public function store(int $productId, StoreRequest $request): JsonResponse
    {
        $data = $this->service->store(array_merge(
            $request->validated(),
            [
                'product_id' => $productId,
                'user_id' => auth('api')->user()->id,
            ],
        ));

        return response()->json(
            ['data' => new ReviewResource($data)],
        );
    }
}
