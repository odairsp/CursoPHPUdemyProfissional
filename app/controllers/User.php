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
        if (!isset($params)) {
            return redirect('/');
        }
        $user = findBy('users', 'id', $params['user']);
        return [
            'view' => 'home.php',
            'data' => ['title' => 'Show', 'user' => $user]
        ];
    }

    public function create()
    {
        return [
            'view' => 'create.php',
            'data' => ['title' => 'Create']
        ];
    }

    public function store()
    {
        $validate = validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|maxLen:5'
        ]);

        if (!$validate) {
            return redirect('/user/create');
        }
        return redirect('/user/create');
    }
}