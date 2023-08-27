<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\IndexRequest;
use App\Http\Resources\Announcement\AnnouncementCollection;
use App\Http\Resources\Announcement\AnnouncementResource;
use App\Services\Contracts\AnnouncementServiceInterface;
use Illuminate\Http\JsonResponse;

class AnnouncementController extends Controller
{
    public function __construct(private AnnouncementServiceInterface $service)
    {}

    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

        return response()->json(
            (new AnnouncementCollection($paginatedData)),
        );
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new AnnouncementResource($data)],
        );
    }
}
