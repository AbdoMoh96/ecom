<?php

namespace core;



 class Router {

     public static $routes = [];

     public static function get($route, $action){
         self::$routes['get'][$route] = $action;
     }
     public static function post($route, $action){
         self::$routes['post'][$route] = $action;
     }
     public static function delete($route, $action){
         self::$routes['delete'][$route] = $action;
     }

     // add logic to build all the routes using static methods
 }