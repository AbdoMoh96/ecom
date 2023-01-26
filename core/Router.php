<?php

namespace core;



 class Router {

     public static $routes = [
      'get' => [],
      'post' => [],
      'delete' => []
     ];

     public static function get($route, $controller){
       self::$routes['get'][] =  [$route => [$controller]];
     }
     public static function post(){}
     public static function delete(){}

     // add logic to build all the routes using static methods
 }