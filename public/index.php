<?php

require __DIR__.'/../vendor/autoload.php';

use core\Application;
use Dotenv\Dotenv;

Dotenv::createImmutable(__DIR__.'/../')->load();

Application::init();




