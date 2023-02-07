<?php

namespace app\Models;

use core\connection\DB;

final class Book extends Products
{
    private static int $typeId = 2;
    public float $weight;

    public static function all()
    {
        return DB::query("
                SELECT 
                       p.id as 'product_id',
                       p.sku as 'sku',
                       p.name as 'name',
                       p.price as 'price',
                       pt.id as 'type_id',
                       pt.name as 'type'
                FROM products as p
                LEFT JOIN product_types as pt
                ON p.type = pt.id
                LEFT JOIN product_attributes as pa
                ON pa.product_id = p.id
                WHERE pt.id = :typeId
             ",'get',[
                 'typeId' => self::$typeId
        ]);
    }


    public function save()
    {
        $product_id = DB::insertGetId("
        INSERT INTO products(`sku`,`name`,`price`,`type`)
        VALUES (:sku, :name, :price, :type_id);
     ", [
            "sku" => $this->sku,
            "name" => $this->name,
            "price" => $this->price,
            "type_id" => self::$typeId
        ]);

        DB::queryVoid("
        INSERT INTO product_attributes(`product_id`, `weight`)
        VALUES (:product_id, :weight );
     ", [
            "product_id" => $product_id,
            "weight" => $this->weight,
        ]);
    }
}