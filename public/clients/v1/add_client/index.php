<?php
$httpVerb = $_SERVER['REQUEST_METHOD'];
if($httpVerb !== 'POST'){
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'code' => 405,
        'message' => 'Method Not Allowed'
    ]);
    exit;
}

echo "Metodo: $httpVerb";