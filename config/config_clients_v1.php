<?php
require_once __DIR__ . "/../inc/init.php";
define('MYSQL', [
    'type'     => 'mysql',
    'host'     => 'localhost',
    'database' => $_ENV['DATABASE_NAME'],
    'username' => $_ENV['DATABASE_USERNAME'],
    'password' => $_ENV['DATABASE_PASSWORD']
]);