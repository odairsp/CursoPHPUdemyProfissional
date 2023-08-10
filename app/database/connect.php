<?php

function connect()
{
    return new PDO("mysql:host=localhost;dbname=udemyphp", 'root', '123456', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}