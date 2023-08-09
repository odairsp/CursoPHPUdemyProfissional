<?php

function dd($all)
{
    var_dump($all);
    die();
}

define('ROOT', dirname(__FILE__, 3));
define('VIEWS', ROOT . '/app/views/');
define('CONTROLLER_PATH', 'app\\controllers\\');
define('LOGGED', 'LOGGED');