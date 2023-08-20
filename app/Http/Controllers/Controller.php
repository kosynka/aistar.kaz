<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function result(array $data): JsonResponse
    {
        return response()->json([
            'data' => $data['data'] ?? [],
            'message' => $data['message'] ?? 'ok',
            ])->setStatusCode($data['code'] ?? 200);
    }
}
