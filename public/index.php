<?php

require __DIR__.'/../vendor/autoload.php';

use core\Application;
use Dotenv\Dotenv;
Dotenv::createImmutable(__DIR__.'/../')->load();


header('Content-Type: application/json');

Application::init();

echo json_encode([
    'server_url' => $_ENV['DB_HOST']
]);
