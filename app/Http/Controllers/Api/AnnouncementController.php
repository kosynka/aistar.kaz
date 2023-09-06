<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Http\Resources\Announcement\AnnouncementCollection;
use App\Http\Resources\Announcement\AnnouncementResource;
use App\Services\V1\AnnouncementService;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Tag(
 *     name="Announcements",
 *     description="API endpoints for managing announcements"
 * )
 */
/**
 * @OA\Info(
 *     title="Announcements API",
 *     version="1.0.0",
 *     description="Описание  API",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 */

class AnnouncementController extends Controller
{
    public function __construct(private AnnouncementService $service)
    {}

    /**
     * @OA\Get(
     *     path="/api/announcements",
     *     operationId="getAnnouncements",
     *     tags={"Announcements"},
     *     summary="Get a list of announcements",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of announcements",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Announcement")
     *         )
     *     )
     * )
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $paginatedData = $this->service->index($request->validated());

        return response()->json(
            (new AnnouncementCollection($paginatedData)),
        );
    }

    /**
     * @OA\Get(
     *     path="/api/announcements/{id}",
     *     operationId="getAnnouncementById",
     *     tags={"Announcements"},
     *     summary="Get an announcement by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Announcement ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Announcement details",
     *         @OA\JsonContent(ref="#/components/schemas/Announcement")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Announcement not found"
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json(
            ['data' => new AnnouncementResource($data)],
        );
    }
}
