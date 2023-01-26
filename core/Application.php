<?php

namespace core;

use core\Providers\Providers;
use core\Router; // temp

 class Application {



     public function __construct(){

     }

     public static function init(){

         // make a db connection
         // generate all the routes
         // get route from request class
         Providers::init();

         echo json_encode(Router::$routes);
     }




 }