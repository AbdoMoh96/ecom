<?php

 function jsonResponse($data, $status) {
     header('Content-Type: application/json');
     http_response_code($status);
     echo json_encode($data);
 }

 function redirect($url){
     header("Location: $url");
     die();
 }