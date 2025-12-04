<?php
use Medoo\Medoo;

require_once __DIR__ . "/../../../../config/config_clients_v1.php";
require_once __DIR__ . "/../../../../inc/init.php";

Api::checkHTTPMethod('POST');

$request = json_decode(file_get_contents('php://input'), true);

if (!is_array($request)) {
    Api::errorMessage(400, 'Os dados não foram enviados corretamente, tente novamente.');
}
if (key_exists('name', $request)) {
   Api::errorMessage(400, 'O campo name é obrigatório');
}
if (key_exists('phone', $request)) {
    Api::errorMessage(400, 'O campo phone é obrigatório')    ;
}
if (key_exists('email', $request)) {
    Api::errorMessage(400, 'O campo email é obrigatório');
}
if (key_exists('address', $request)) {
    Api::errorMessage(400, 'O campo address é obrigatório');
}
if (key_exists('postalZip', $request)) {
    Api::errorMessage(400, 'O campo postalZip é obrigatório');
}
if (key_exists('region', $request)) {
    Api::errorMessage(400, 'O campo region é obrigatório');
}
if (key_exists('country', $request)) {
    Api::errorMessage(400, 'O campo country é obrigatório');
}

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
