<?php

namespace app\Services;

use app\Models\Products;

class ProductService
{
    public function getAllProducts()
    {
        return Products::all();
    }

    public function storeProduct($data)
    {
        $product = new Products();
        $product->sku = $data['sku'];
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->type_id = $data['type_id'];
        $product->size = $data['size'];
        $product->weight = $data['weight'];
        $product->height = $data['height'];
        $product->width = $data['width'];
        $product->length = $data['length'];
        $product->save();
    }
}