<?php

namespace app\Models;

use core\connection\DB;

class Products
{

    public static function all(){
      return DB::query("
                SELECT 
                       p.id as 'product_id',
                       p.sku as 'sku',
                       p.name as 'name',
                       p.price as 'price',
                       pt.name as 'type'
                FROM products as p
                LEFT JOIN product_types as pt
                ON p.type = pt.id
             ");
    }

}