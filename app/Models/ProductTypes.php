<?php

namespace app\Models;

use core\connection\DB;

class ProductTypes
{
    public static function all()
    {
        return DB::query('SELECT * FROM product_types');
    }
}