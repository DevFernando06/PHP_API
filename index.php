<?php
// Require Composer's autoloader
require 'vendor/autoload.php';

// Import Medoo namespace
use Medoo\Medoo;

// Initialize database connection
$database = new Medoo([
    'type' => 'mysql',
    'host' => '127.0.0.1',
    'port' => 3308,
    'database' => 'api_teste',
    'username' => 'root',
    'password' => ''
]);

// Retrieve data
$data = $database->select('client', '*');

print_r($data);