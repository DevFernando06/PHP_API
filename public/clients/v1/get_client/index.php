<?php
use Medoo\Medoo;

require_once __DIR__ . "/../../../../config/config_clients_v1.php";
require_once __DIR__ . "/../../../../inc/init.php";

Api::checkHTTPMethod('POST');

$request = json_decode(file_get_contents('php://input'), true);

$database = new Medoo(MYSQL);
$data = $database->select("clients", "*", ['id' => $request['id']]);

Api::successMessage(200, $data);