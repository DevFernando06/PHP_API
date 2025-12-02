<?php
require_once "../../../../inc/init.php";
Api::checkHTTPMethod('POST');

echo json_encode(['
    status' => 'success'
    ]);