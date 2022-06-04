<?php

namespace App\Helpers;

class ApiFormatter
{
    protected static $response =  [
        'code' =>  null,
        'message' => null,
        'active user' => null,
    ];

    public static function createApi($code = null, $message = null, $data = null)
    {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['active user'] = $data;

        return response()->json(self::$response, self::$response['code']);
    }
}
