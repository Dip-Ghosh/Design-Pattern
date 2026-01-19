<?php
declare(strict_types=1);

return [
    'app_name' => 'Design Patterns Project',
    'env'      => 'development',

    'log' => [
        'file'  => __DIR__.'/../Logs/app.log',
        'level' => 'debug',
    ],

    'db' => [
        'host'    => 'localhost',
        'name'    => 'app',
        'user'    => 'root',
        'pass'    => '',
        'charset' => 'utf8mb4',
        'driver'  => 'sqlite',
        'dsn'     => 'sqlite::memory:',
    ],
];
