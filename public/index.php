<?php
require "./bootstrap.php";

try {
    $data = router();

    if (!isset($data['data'])) {
        throw new Exception("O indice data está faltando!");
    }
    
    if (!isset($data['view'])) {
        throw new Exception("O indice view está faltando!");
    }
    
    if (!file_exists(VIEWS . $data['view'])) {
        throw new Exception("Essa view {$data['view']} não exixte!");
    }
    
    extract($data['data']);
    $view = $data['view'];


    require VIEWS . 'master.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}