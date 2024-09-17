<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonExceptionResponse
{
    public static function error($message = '', int $httpCode = Response::HTTP_BAD_REQUEST, ?int $customCode = null, ?\Throwable $e = null, mixed $data = null): JsonResponse
    {
        $error = [
            'code' => $customCode ?? $httpCode,
            'message' => $message,
        ];

        if ($data) {
            $error['data'] = json_encode($data);
        }

        $data = [
            'error' => $error,
        ];

        if ($e !== null && config('app.debug')) {
            $data['debug'] = [
                'exceptionClass' => get_class($e),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
        }

        return new JsonResponse($data, $httpCode);
    }
}
