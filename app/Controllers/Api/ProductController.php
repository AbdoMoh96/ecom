<?php

namespace app\Controllers\Api;

use app\Models\Products;
use app\Services\ProductService;

class ProductController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index(){

        jsonResponse([
            $this->productService->getAllProducts()
        ], 200);
    }
}