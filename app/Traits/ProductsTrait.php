<?php

namespace app\Traits;

use app\Models\Dvd;
use app\Models\Book;
use app\Models\Furniture;
use core\connection\DB;

trait ProductsTrait
{
    private array $methodSelector = [
        1 => 'storeDvd',
        2 => 'storeBook',
        3 => 'storeFurniture'
    ];

    private function storeDvd($data)
    {
        if ($this->isUnique($data)) {
            $dvd = new Dvd();
            $dvd->sku = $data['sku'];
            $dvd->name = $data['name'];
            $dvd->price = $data['price'];
            $dvd->size = $data['size'];
            $dvd->save();
        } else {
            jsonResponse(['message' => 'product already exists'], 400);
            die();
        }
    }

    private function storeBook($data)
    {
        if ($this->isUnique($data)) {
            $book = new Book();
            $book->sku = $data['sku'];
            $book->name = $data['name'];
            $book->price = $data['price'];
            $book->weight = $data['weight'];
            $book->save();
        } else {
            jsonResponse(['message' => 'product already exists'], 400);
            die();
        }
    }

    private function storeFurniture($data)
    {
        if ($this->isUnique($data)) {
            $furniture = new Furniture();
            $furniture->sku = $data['sku'];
            $furniture->name = $data['name'];
            $furniture->price = $data['price'];
            $furniture->height = $data['height'];
            $furniture->width = $data['width'];
            $furniture->length = $data['length'];
            $furniture->save();
        } else {
            jsonResponse(['message' => 'product already exists'], 400);
            die();
        }
    }

    private function isUnique($data)
    {
        $product = DB::query("
                SELECT 
                       sku
                FROM products
                WHERE products.sku = :sku
             ", 'first', [
            'sku' => $data['sku']
        ]);

        if ($product['sku']) {
            return false;
        }
        return true;
    }
}