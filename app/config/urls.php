<?php
return [
    '/' => 'site/index',
    'admin' => 'admin/site/index',
    [
        '__class'  => 'yii\web\GroupUrlRule',
        'prefix' => 'admin/site',
        'rules'  => [
            'login' => 'login',
            'logout' => 'logout',
        ],
    ],
    [
        '__class'  => 'yii\web\GroupUrlRule',
        'prefix' => 'site',
        'rules'  => [
            'login' => 'login',
            'logout' => 'logout',
            'about' => 'about',
            'contact' => 'contact',
        ],
    ],
];
