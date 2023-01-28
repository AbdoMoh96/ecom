<?php

namespace app\Models;

use core\connection\DB;

class Products
{
    public string $sku;
    public string $name;
    public float $price;
    public int $type_id;
    public ?float $size;
    public ?float $weight;
    public ?float $height;
    public ?float $width;
    public ?float $length;

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


    public function save()
    {
        $product_id = DB::insertGetId("
        INSERT INTO products(`sku`,`name`,`price`,`type`)
        VALUES (:sku, :name, :price, :type_id);
     ", [
            "sku" => $this->sku,
            "name" => $this->name,
            "price" => $this->price,
            "type_id" => $this->type_id
        ]);

        DB::queryVoid("
        INSERT INTO product_attributes(`product_id`, `size`, `weight`, `height`, `width`, `length`)
        VALUES (:product_id, :size, :weight, :height, :width, :length);
     ", [
            "product_id" => $product_id,
            "size" => $this->size,
            "weight" => $this->weight,
            "height" => $this->height,
            "width" => $this->width,
            "length" => $this->length
        ]);
    }

}