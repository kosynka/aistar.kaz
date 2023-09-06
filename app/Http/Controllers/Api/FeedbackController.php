<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\StoreRequest;
use App\Services\Contracts\FeedbackServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="Feedback API",
 *     version="1.0.0",
 *     description="Описание вашего API",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 */

class FeedbackController extends Controller
{
    public function __construct(private FeedbackServiceInterface $service)
    {}

    /**
     * @OA\Post(
     *     path="/api/feedback",
     *     operationId="storeFeedback",
     *     tags={"Feedback"},
     *     summary="Submit user feedback",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "message"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Feedback submitted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity"
     *     )
     * )
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $data = $this->service->register($request->validated());

        return $this->result($data);
    }
}
