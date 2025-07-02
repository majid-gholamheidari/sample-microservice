<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    /**
     * @param array $result
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse(array $result = [] , string $message = '', int $code = 400): JsonResponse
    {
        $response = [
            'success' => false,
            'code'    => $code,
            'message' => $message ?? "",
            'data'    => $result,
        ];
        return response()->json($response, $code);
    }


    /**
     * @param array $result
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse(array $result = [] , string $message = '', int $code = 200): JsonResponse
    {
        $response = [
            'success' => true,
            'code'    => $code,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response, $code);
    }

}
