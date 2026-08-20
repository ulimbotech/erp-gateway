<?php

namespace App\Support\Api;

use Illuminate\Http\JsonResponse;

class ApiError
{
    public static function make(
        string $code,
        string $message,
        array $details = [],
        array $meta = [],
        int $status = 400
    ): JsonResponse {
        return response()->json([
            'success' => false,
            'error' => [
                'code' => $code,
                'message' => $message,
                'details' => $details,
            ],
            'meta' => $meta,
        ], $status);
    }
}
