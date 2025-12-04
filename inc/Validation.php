<?php
require_once __DIR__ . '/init.php';
class Validation
{
    public static function validationParam($arrRules, $arrRequest)
    {
        foreach ($arrRules as $key) {
            if (!key_exists($key, $arrRequest)) {
                http_response_code(400);
                Api::errorMessage(400, "O campo $key é obrigatório");
            }
        }

    }
}