<?php
require "./bootstrap.php";

try {
    $data = router();

    if (!isset($data['data'])) {
        throw new Exception("O indice data está faltando!");
    }

    if (!isset($data['data']['title'])) {
        throw new Exception("O indice title está faltando!");
    }

    if (!isset($data['view'])) {
        throw new Exception("O indice view está faltando!");
    }

    if (!file_exists(VIEWS . $data['view'] . '.php')) {
        throw new Exception("Essa view {$data['view']} não existe!");
    }

    // Create new Plates instance
    $templates = new League\Plates\Engine(VIEWS);

    // Render a template
    echo $templates->render($data['view'], $data['data']);


    // extract($data['data']);
    // $view = $data['view'];
    // require VIEWS . 'master.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}
