<?php
use Medoo\Medoo;

require_once __DIR__ . "/../../../../config/config_clients_v1.php";
require_once __DIR__ . "/../../../../inc/init.php";

Api::checkHTTPMethod('POST');

$request = json_decode(file_get_contents('php://input'), true);

if (!key_exists('id', $request)) {
    Api::errorMessage(400, 'O campo id é obrigatorio');
}
if (!is_numeric($request['id'])) {
    Api::errorMessage(400, 'O campo id deve ser um número');
}

$database = new Medoo(MYSQL);
$data = $database->select("clients", "*", ['id' => $request['id']]);

Api::successMessage(200, $data);