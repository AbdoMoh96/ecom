<?php

namespace app\Controllers\Api;
use app\Models\Products;

class HomeController
{
   public function index(){

     jsonResponse([
         'product types' => Products::all()
     ], 200);


   }
}