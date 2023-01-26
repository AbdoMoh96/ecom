<?php

namespace core;

use core\Router;

class Request
{

    public static function handle(){
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (key_exists($_SERVER['REQUEST_URI'], Router::$routes[$method])){

            if (!is_array(Router::$routes[$method][$_SERVER['REQUEST_URI']])){
                $callback = Router::$routes[$method][$_SERVER['REQUEST_URI']];
                $callback();
                exit();
            }

            if (class_exists(Router::$routes[$method][$_SERVER['REQUEST_URI']][0])){
                $controller = Router::$routes[$method][$_SERVER['REQUEST_URI']][0];
                $method = Router::$routes[$method][$_SERVER['REQUEST_URI']][1];
                $controller = new $controller();
                $controller->$method();
                exit();
            }
        }else{
            jsonResponse("nah man we don't have that", 404);
        }
    }
}