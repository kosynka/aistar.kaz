<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\IndexRequest;
use App\Http\Resources\City\CityCollection;
use App\Http\Resources\City\CityResource;
use App\Services\Contracts\CityServiceInterface;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    public function __construct(private CityServiceInterface $service)
    {}

    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

        return response()->json(
            (new CityCollection($paginatedData)),
        );
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new CityResource($data)],
        );
    }
}
