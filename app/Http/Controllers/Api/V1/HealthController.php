<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'service' => 'ERPGateway',
                'status' => 'healthy',
                'version' => '1.0.0',
                'uptime' => now()->diffForHumans(config('app.start_time'))
            ],
            'message' => 'Ulimbo ERP Gateway is operational',
            'meta' => [],
        ]);
    }
}
