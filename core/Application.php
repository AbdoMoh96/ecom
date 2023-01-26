<?php

namespace core;

use core\Providers\Providers;
use core\Request;
use core\connection\DB;

 class Application {

     public static function init(){
         $db = new DB();
         $db->connect();
         Providers::init();
         Request::handle();
     }
 }