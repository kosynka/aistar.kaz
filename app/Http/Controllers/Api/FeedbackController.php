<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\StoreRequest;
use App\Services\Contracts\FeedbackServiceInterface;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    public function __construct(private FeedbackServiceInterface $service)
    {}

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $this->service->register($request->validated());

        return $this->result($data);
    }
}
