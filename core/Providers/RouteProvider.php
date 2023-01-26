<?php

namespace core\Providers;


 class RouteProvider {
    private static $routeFiles = [
        'routes/api.php'
    ];

    public static function up(){

        foreach(self::$routeFiles as $file){
            require __DIR__.'/../../'.$file;
        }
    }
}