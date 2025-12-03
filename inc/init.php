<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Api.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();