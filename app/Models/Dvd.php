<?php

namespace app\Models;

use core\connection\DB;


final class Dvd extends Products
{
    private static int $typeId = 1;
    public float $size;

    public static function all()
    {
        return DB::query("
                SELECT 
                       p.id as 'product_id',
                       p.sku as 'sku',
                       p.name as 'name',
                       p.price as 'price',
                       pt.id as 'type_id',
                       pt.name as 'type',
                       pa.size as 'size'
                FROM products as p
                LEFT JOIN product_types as pt
                ON p.type = pt.id
                LEFT JOIN product_attributes as pa
                ON pa.product_id = p.id 
                WHERE pt.id = :typeId;
             ", 'get' , [
                 'typeId' => self::$typeId
              ]);
    }

    public function save()
    {
        $typeId = self::$typeId;
        $product_id = DB::insertGetId("
        INSERT INTO products(`sku`,`name`,`price`,`type`)
        VALUES (:sku, :name, :price, :type_id);
     ", [
            "sku" => $this->sku,
            "name" => $this->name,
            "price" => $this->price,
            "type_id" => $typeId
        ]);

        DB::queryVoid("
        INSERT INTO product_attributes(`product_id`, `size`)
        VALUES (:product_id, :size);
     ", [
            "product_id" => $product_id,
            "size" => $this->size
        ]);
    }
}