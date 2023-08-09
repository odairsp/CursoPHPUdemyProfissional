<?php

function setFlash($index, $message)
{
    if (!isset($_SESSION['flash'][$index])) {
        $_SESSION['flash'][$index] = $message;
    }
}

function getFlash($index, $style = 'danger')
{
    if (isset($_SESSION['flash'][$index])) {
        $flash = $_SESSION['flash'][$index];
        unset($_SESSION['flash'][$index]);

        return "<div class=\"mt-2 mb-2 p-1 alert alert-" . $style . "\">" . $flash . "</div>";
    }
}