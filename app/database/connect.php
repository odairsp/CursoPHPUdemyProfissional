<?php

function connect()
{
    return new PDO("mysql:host=localhost;dbname=udemyphp", 'root', 'etec', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}
