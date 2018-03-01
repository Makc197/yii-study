<?php

return [
//    'theme' => 'custom',
    'theme' => 'main',
    'adminEmail' => 'admin@example.com',
    'es_hosts' => [
        [
            'host' => 'localhost',
            'port' => '9200',
            'user' => 'elastic',
            'pass' => 'changeme'
        ],
    ],
    'elasticsearch' => [
        'class' => 'yii\elasticsearch\Connection',
        'auth' => ['username' => 'elastic', 'password' => 'changeme'],
        'nodes' => [
            ['http_address' => '127.0.0.1:9200'],
            // configure more hosts if you have a cluster
        ],
    ],
];
