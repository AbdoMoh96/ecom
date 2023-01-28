<?php

use core\Router;
use app\Controllers\Api\ProductController;
use app\Controllers\Api\ProductTypesController;

Router::get('/', function () {
    redirect('/api');
});

Router::get('/api', function () {
    jsonResponse('ecom api version 1.0.0', 200);
});

Router::get('/api/products/list', [ProductController::class, 'index']);

Router::get('/api/products/types/list', [ProductTypesController::class, 'index']);

Router::post('/api/products/new', [ProductController::class, 'store']);

Router::delete('/api/products/delete', [ProductController::class, 'destroy']);

