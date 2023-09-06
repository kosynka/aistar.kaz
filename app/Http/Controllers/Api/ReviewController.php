<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\IndexRequest;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Services\V1\ReviewService;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="Название вашего API",
 *     version="1.0.0",
 *     description="Описание вашего API",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 */
class ReviewController extends Controller
{
    public function __construct(private ReviewService $service)
    {}

    /**
     * @OA\Get(
     *     path="/api/products/{productId}/reviews",
     *     operationId="getReviewsByProductId",
     *     tags={"Reviews"},
     *     summary="Get reviews for a product by ID",
     *     @OA\Parameter(
     *         name="productId",
     *         in="path",
     *         description="Product ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of reviews for the product",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Review")
     *         )
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/reviews/{id}",
     *     operationId="getReviewById",
     *     tags={"Reviews"},
     *     summary="Get a review by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Review ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Review details",
     *         @OA\JsonContent(ref="#/components/schemas/Review")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found"
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new ReviewResource($data)],
        );
    }

    /**
     * @OA\Post(
     *     path="/api/products/{productId}/reviews",
     *     operationId="storeReview",
     *     tags={"Reviews"},
     *     summary="Create a new review for a product",
     *     @OA\Parameter(
     *         name="productId",
     *         in="path",
     *         description="Product ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ReviewRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Review created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Review")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
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

