<?php

namespace app\Traits;

use app\Models\Dvd;
use app\Models\Book;
use app\Models\Furniture;

trait ProductsTrait
{
    private function storeDvd($data){
          $dvd = new Dvd();
          $dvd->sku = $data['sku'];
          $dvd->name = $data['name'];
          $dvd->price = $data['price'];
          $dvd->size = $data['size'];
          $dvd->save();
    }

    private function storeBook($data){
        $book = new Book();
        $book->sku = $data['sku'];
        $book->name = $data['name'];
        $book->price = $data['price'];
        $book->weight = $data['weight'];
        $book->save();
    }

    private function storeFurniture($data){
        $furniture = new Furniture();
        $furniture->sku = $data['sku'];
        $furniture->name = $data['name'];
        $furniture->price = $data['price'];
        $furniture->height = $data['height'];
        $furniture->width = $data['width'];
        $furniture->length = $data['length'];
        $furniture->save();
    }
}