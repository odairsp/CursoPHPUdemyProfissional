<?php
require "./bootstrap.php";

try {
    $data = router();
    var_dump($data);
    
    
    extract($data['data']);
    
    require VIEWS . 'master.php';
   
} catch (Exception $e) {
    var_dump($e->getMessage());
}