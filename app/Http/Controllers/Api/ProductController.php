<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Services\V1\ProductService;
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
class ProductController extends Controller
{
    public function __construct(private ProductService $service)
    {}

    /**
     * @OA\Get(
     *     path="/api/products",
     *     operationId="getProducts",
     *     tags={"Products"},
     *     summary="Get a list of products",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of products",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
     *         )
     *     )
     * )
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

        return response()->json(
            (new ProductCollection($paginatedData)),
        );
    }

    /**
     * @OA\Get(
     *     path="/api/products/{productId}",
     *     operationId="getProductById",
     *     tags={"Products"},
     *     summary="Get a product by ID",
     *     @OA\Parameter(
     *         name="productId",
     *         in="path",
     *         description="Product ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product details",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function show(int $productId): JsonResponse
    {
        $data = $this->service->show($productId);

        return response()->json(
            ['data' => new ProductResource($data)],
        );
    }
}
