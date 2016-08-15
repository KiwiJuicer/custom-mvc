<?php
return [
    'routes' => [
        'index' => [
            'name' => 'index',
            'path' => '/',
            'controller' => \Controller\IndexController::class,
            'action' => 'index'
        ],
        'objects' => [
            'name' => 'objects',
            'path' => '/objects/:id/:count',
            'controller' => \Controller\IndexController::class,
            'action' => 'objects'
        ],
        'notFound' => [
            'name' => 'notFound',
            'path' => '/404',
            'controller' => \Controller\AbstractController::class,
            'action' => 'notFound'
        ]
    ]
];