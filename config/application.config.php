<?php
return [
    'routes' => [
        'index' => [
            'name' => 'index',
            'path' => '/',
            'controller' => \Controller\IndexController::class,
            'action' => 'index'
        ],
        'notFound' => [
            'name' => 'notFound',
            'path' => '/404',
            'controller' => \Controller\AbstractController::class,
            'action' => 'notFound'
        ]
    ]
];