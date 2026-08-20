<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HealthController;
use Illuminate\Http\Request;


Route::prefix('v1')->group(function () {
    Route::get('/health', HealthController::class);
    Route::get('/test-error', function () {
        abort(404);
    });
    Route::get('/test-validation', function (Request $request) {

        $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required', 'string', 'min:3'],
        ]);

        return response()->json([
            'success' => true,
            'data' => $request->only(['email', 'name']),
            'message' => 'Validation successful.',
            'meta' => [],
        ]);
    });
});
