<?php
header('Content-Type: application/json');



 echo json_encode([
     "api_version" => "1.0.0",
     "type" => "ecommerce_api",
 ]);