<?php

 function dd($data){
     echo '<pre style="display: block; min-height: 100vh; background-color: darkgrey; padding: 2rem;">';
      var_dump($data);
     echo '</pre>';
     die();
 }