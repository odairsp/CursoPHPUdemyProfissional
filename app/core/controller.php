<?php


function loadController($matchedUri, $params)
{
    [$controller, $method] = explode('@', array_values($matchedUri)[0]);
    $controllerWithNamespace = CONTROLLER_PATH.$controller;

    if (!class_exists(CONTROLLER_PATH . $controller)) {
        throw new Exception("Controller '{$controller}', não existe!");
    }
    
    $controllerInstance = new $controllerWithNamespace;
    if(!method_exists($controllerInstance, $method)){
        throw new Exception("Método '{$method}', não existe no controller '{$controller}'!");
    }

    $controller = $controllerInstance->$method($params);

    if(!$_SERVER['REQUEST_METHOD']==='POST'){
        die();
    }
    return $controller;
}