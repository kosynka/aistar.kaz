<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\IndexRequest;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Services\Contracts\ReviewServiceInterface;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function __construct(private ReviewServiceInterface $service)
    {}

    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

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

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $this->service->register($request->validated());

        return $this->result($data);
    }
}
