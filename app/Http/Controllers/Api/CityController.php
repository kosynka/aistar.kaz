<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\IndexRequest;
use App\Http\Resources\City\CityCollection;
use App\Http\Resources\City\CityResource;
use App\Services\Contracts\CityServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="Citiess API",
 *     version="1.0.0",
 *     description="Cities API",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 */

class CityController extends Controller
{
    public function __construct(private CityServiceInterface $service)
    {}

    /**
     * @OA\Get(
     *     path="/api/cities",
     *     operationId="getCities",
     *     tags={"Cities"},
     *     summary="Get a list of cities",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of cities",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/City")
     *         )
     *     )
     * )
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

        return response()->json(
            (new CityCollection($paginatedData)),
        );
    }

    /**
     * @OA\Get(
     *     path="/api/cities/{id}",
     *     operationId="getCityById",
     *     tags={"Cities"},
     *     summary="Get a city by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="City ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="City details",
     *         @OA\JsonContent(ref="#/components/schemas/City")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="City not found"
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new CityResource($data)],
        );
    }
}
