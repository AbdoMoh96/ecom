<?php

use core\Router;
use app\Controllers\Api\ProductController;

Router::get('/', function (){
    jsonResponse('ecom api version 1.0.0', 200);
});

Router::get('/products', [ProductController::class, 'index']);

