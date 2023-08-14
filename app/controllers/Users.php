<?php

namespace app\controllers;

class Users
{
    public function index()
    {
        $users = all('users');
        echo json_encode($users);
    }
}