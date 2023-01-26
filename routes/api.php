<?php

use core\Router;
use app\Controllers\Api\HomeController;

Router::get('/', [HomeController::class, 'index']);

Router::get('/products', function () {
    jsonResponse('products controller', 200);
});

