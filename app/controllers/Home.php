<?php

namespace app\controllers;

class Home
{
    public function index($params)
    {
        return [
            'views' =>'home',
            'data' => ['name'=>'Odair','views'=>'home']
        ];
    }
}