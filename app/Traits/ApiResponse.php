<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function ok(string $message = null,array $data = [],): JsonResponse
    {
        return $this->successResponse($data, $message);
    }

    private function successResponse(array $data = [], $message = null): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message
        ]);
    }

    public function errorResponse(string $message, $code = 400): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }
}
