<?php

namespace core;

 class Application {



     public function __construct(){

     }

     public static function init(){

         // make a db connection
         // generate all the routes
         // get route from request class
         // run route using init method on Route class

         // move this code to a Providers/RouteProvider class / all providers should be called here wrap them in a provider class
         $routeFiles = [
             'routes/api.php'
         ];

         foreach($routeFiles as $file){
             require __DIR__.'/../'.$file;
         }
     }




 }