<?php

namespace app\Services;

use app\Models\Products;
use app\Models\ProductTypes;
use app\Traits\ProductsTrait;
/*use app\Models\Dvd;
use app\Models\Book;
use app\Models\Furniture;*/

class ProductService
{
    use ProductsTrait;

    public function getAllProducts()
    {
        return Products::all();

        // polymorphism tested
        /*return [
            ...Dvd::all(),
            ...Book::all(),
            ...Furniture::all()
        ];*/
    }

    public function storeProduct($data)
    {
        switch ($data['type_id']){
            case 1 :
                $this->storeDvd($data);
                break;
            case 2 :
                $this->storeBook($data);
                break;
            case  3 :
                $this->storeFurniture($data);
                break;
            default :
                jsonResponse(['message' => 'product type id not found'], 400);
                die();
        }
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