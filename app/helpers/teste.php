<?php


$array = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];


function valida(array $array)
{
    foreach ($array as $key => $value) {
        if ($value === 'c') {
            echo ' deu ruim!';
            return;
        }
        echo $value;
    }
    echo " deu bom!";
    return;
}


valida($array);
