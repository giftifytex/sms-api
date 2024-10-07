<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses
{
    public function success($data, $message = 'Success', $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public function error($message, $statusCode = 400)
    {
        return response()->json([
            'status' => $statusCode,
            'error' => $message,
        ], $statusCode);
    }
}
