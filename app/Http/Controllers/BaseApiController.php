<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="My optima API",
 *     version="1.0.0",
 *     description="description"
 * )
 */
class BaseApiController extends Controller
{
    /**
     * success response method.
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result = [], string $message = '')
    {
        $response['status'] = 'success';
        if($result)
            $response['data'] = $result;
        if($message)
            $response['message'] = $message;

        return response()->json($response, 200);
    }

    /**
     * return error response.
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 200)
    {
        $response = [
            'status' => 'error',
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

}
