<?php
return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

        // View settings
        'view' => [
            'template_path' => __DIR__ . '/../resources/views',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],

        // database settings
        'db' => [
            'db_type' => 'mysql',
            'host' => 'localhost',
            'dbname' => 'test2',
            'username' => 'slim',
            'password' => 'CZvH5nrpjJtTzcAq',
            'charset'   => 'utf8mb4',
            'db_port' => '8889',
            'collation' => 'utf8mb4_general_ci'
        ]
    ],
];
