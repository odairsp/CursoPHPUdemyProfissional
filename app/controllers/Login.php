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

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($email) || empty($password)) {
            return redirect('/login');
        }

        $user = findBy('users', 'email', $email);
        if (!$user) {
            return redirect('/login');
        }

        if (!password_verify($password, $user->password)) {
            return redirect('/login');
        }

        $_SESSION['logged'] = $user;
        return redirect('/');
    }
}
