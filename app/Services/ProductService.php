<?php

namespace app\Services;

use app\Models\Products;
use app\Models\ProductTypes;
use app\Traits\ProductsTrait;

class ProductService
{
    use ProductsTrait;

    public function getAllProducts()
    {
        return Products::all();
    }

    public function storeProduct($data)
    {
        $method = $this->methodSelector[$data['type_id']];
        $this->{$method}($data);
    }

    public function deleteProducts($data)
    {

        $ids = $data['product_ids'];

        Products::delete($ids);
    }

    public function getProductTypes()
    {
        return ProductTypes::all();
    }
}