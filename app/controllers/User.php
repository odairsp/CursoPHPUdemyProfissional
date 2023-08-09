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

    public function create($params)
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
            'email' => 'required|email|unique',
            'password' => 'required|maxLen'
        ]);

        if(!$validate){
            return setMessageAndRedirect('message','Algo deu errado!','/user/create');
        }
    }
}
