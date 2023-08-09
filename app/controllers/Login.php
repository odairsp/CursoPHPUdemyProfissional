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
            return setMessageAndRedirect('message', 'Usuário ou senha em branco!', '/login');
        }

        $user = findBy('users', 'email', $email);

        if (!$user) {

            return setMessageAndRedirect('message', 'Usuário inexistente!', '/login');
        }

        if ($password != $user->password) {

            return setMessageAndRedirect('message', 'Usuário ou senha errados', '/login');
        }

        $_SESSION[LOGGED] = $user;
        return redirect('/');
    }

    function logout()
    {
        unset($_SESSION[LOGGED]);
        return redirect('/');
    }
}