<?php

namespace core\Providers;



class Providers
{
 public static function init(){
     RouteProvider::up(); // set all routes from root/routes directory
 }
}