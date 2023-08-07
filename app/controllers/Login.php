<?php

namespace app\controllers;

class Login
{
    public function index($params)
    {
        $users = all('users');
        return [
            'view' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }
}