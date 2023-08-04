<?php

namespace app\controllers;

class User
{

    public function index($params)
    {

        return ['title' => 'Index', 'data' => 'data'];
    }

    public function show($params)
    {
        var_dump($params);

        if (!isset($params)) {
            return redirect('/');
        }
        $user = findBy('users', 'id', $params['user']);
        return [
            'view' => 'home.php',
            'data' => ['title' => 'Show', 'user' => $user]
        ];
    }

    public function create($params)
    {
        var_dump('create');
    }
}
