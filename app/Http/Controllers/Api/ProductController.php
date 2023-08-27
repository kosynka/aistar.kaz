<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(private ProductServiceInterface $service)
    {}

    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

        return response()->json(
            (new ProductCollection($paginatedData)),
        );
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new ProductResource($data)],
        );
    }
}
