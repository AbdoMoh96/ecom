<?php

namespace app\Controllers\Api;

use app\Services\ProductService;

class ProductTypesController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        jsonResponse(
            $this->productService->getProductTypes()
            , 200);
    }
}