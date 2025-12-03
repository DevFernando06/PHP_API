<?php
use Medoo\Medoo;

require_once "../../../../config/config_clients_v1.php";
require_once "../../../../inc/init.php";
Api::checkHTTPMethod('GET');

$database = new Medoo(MYSQL);
$data = $database->select("clients", "*");

Api::successMessage(200, $data);