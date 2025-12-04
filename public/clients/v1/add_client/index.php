<?php
use Medoo\Medoo;

require_once __DIR__ . "/../../../../config/config_clients_v1.php";
require_once __DIR__ . "/../../../../inc/init.php";

Api::checkHTTPMethod('POST');

$request = json_decode(file_get_contents('php://input'), true);

if (!is_array($request)) {
    Api::errorMessage(400, 'Os dados não foram enviados corretamente, tente novamente.');
}
$params = ['name', 'phone', 'email', 'address', 'postalZip', 'region', 'country'];
Validation::validationParam($params, $request);

$database = new Medoo(MYSQL);
$insertData = [
    'name' => $request['name'],
    'phone' => $request['phone'],
    'email' => $request['email'],
    'address' => $request['address'],
    'postalZip' => $request['postalZip'],
    'region' => $request['region'],
    'country' => $request['country']
];
$data = $database->insert("clients", $insertData);

if(!$data) {
    Api::errorMessage(400, 'Erro ao cadastrar cliente.');
}

Api::successMessage(200, $insertData);
