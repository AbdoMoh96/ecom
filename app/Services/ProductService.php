<?php

namespace app\Services;

use app\Models\Products;

class ProductService
{
    public function getAllProducts(){
        return Products::all();
    }
}