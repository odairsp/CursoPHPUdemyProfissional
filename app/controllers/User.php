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
            'view' => 'home',
            'data' => ['title' => 'Show', 'user' => $user]
        ];
    }

    public function create()
    {
        return [
            'view' => 'create',
            'data' => ['title' => 'Create']
        ];
    }

    public function store()
    {
        $validate = validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|required',
            'password' => 'required|maxLen:5'
        ]);

        if (!$validate) {

            return redirect('/user/create');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);
        $created = create('users', $validate);
        if (!$created) {
            setFlash('message', "ERRO ao cadastrar!");
            return redirect('/user/create');
        }
        return redirect('/');
    }

    public function update()
    {
    }
}