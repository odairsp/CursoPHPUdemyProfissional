<?php

function isAjax(): bool
{
    return isset($_SERVER['HTTP_X_REQUEST_WITH']) && $_SERVER['HTTP_X_REQUEST_WITH'] == 'XMLHttpRequest';
}