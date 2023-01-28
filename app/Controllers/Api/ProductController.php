<?php

namespace app\Controllers\Api;

use app\Models\Products;
use app\Services\ProductService;
use http\Env\Response;

class ProductController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        jsonResponse([
            $this->productService->getAllProducts()
        ], 200);
    }

    public function store()
    {
        $this->productService->storeProduct(Request());

        jsonResponse([
            'message' => 'product created successfully!!'
        ], 200);
    }


    public function destroy()
    {
        $this->productService->deleteProducts(Request());

        jsonResponse([
            'message' => 'products deleted!!'
        ], 200);
    }
}