<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\IndexRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(private CategoryServiceInterface $service)
    {}

    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

        return response()->json(
            (new CategoryCollection($paginatedData)),
        );
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new CategoryResource($data)],
        );
    }
}
