<?php

namespace App\Helpers;

class ApiFormatter
{
    protected static $response = [
        'meta' => [
            'code' => NULL,
            'message' => NULL,
        ],
        'data' => NULL
    ];

    public static function createApi($code = NULL, $message = NULL, $data = NULL)
    {
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
