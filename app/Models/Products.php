<?php

namespace app\Models;

use core\connection\DB;

abstract class Products
{
    public string $sku;
    public string $name;
    public float $price;

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
                       pa.size as 'size',
                       pa.weight as 'weight',
                       pa.height as 'height',
                       pa.width as 'width',
                       pa.length as 'length'
                FROM products as p
                LEFT JOIN product_types as pt
                ON p.type = pt.id
                LEFT JOIN product_attributes as pa
                ON pa.product_id = p.id;
             ");
    }

    public static function delete($ids)
    {
        foreach ($ids as $id) {
            DB::queryVoid("DELETE FROM product_attributes WHERE product_id = :id", [
                "id" => $id
            ]);

            DB::queryVoid("DELETE FROM products WHERE id = :id", [
                "id" => $id
            ]);
        }
    }

    abstract public function save();
}