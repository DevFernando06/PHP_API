<?php

class Api
{
    public static function checkHTTPMethod($httpVerb)
    {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== strtoupper($httpVerb)) {
            self::errorMessage(405, "Method not allowed");
        }
    }
    public static function errorMessage($httpCode, $errorMessage)
    {
        http_response_code($httpCode);
        echo json_encode([
            'status' => 'error',
            'code' => $httpCode,
            'message' => $errorMessage
        ]);
        exit;
    }
    public static function successMessage($httpCode, $data)
    {
        http_response_code($httpCode);
        echo json_encode([
            'status' => 'success',
            'code' => $httpCode,
            'message' => 'success',
            'data' => $data
        ]);
        exit;
    }

}