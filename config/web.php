<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'modules' => [
        'rbacadmin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\MyUser', */
                    'idField' => 'user_id',
                    'usernameField' => 'username',
//                    'fullnameField' => 'profile.full_name',
//                    'extraColumns' => [
//                        [
//                            'attribute' => 'full_name',
//                            'label' => 'Full Name',
//                            'value' => function($model, $key, $index, $column) {
//                                return $model->profile->full_name;
//                            },
//                        ],
//                        [
//                            'attribute' => 'dept_name',
//                            'label' => 'Department',
//                            'value' => function($model, $key, $index, $column) {
//                                return $model->profile->dept->name;
//                            },
//                        ],
//                        [
//                            'attribute' => 'post_name',
//                            'label' => 'Post',
//                            'value' => function($model, $key, $index, $column) {
//                                return $model->profile->post->name;
//                            },
//                        ],
//                    ],
                    'searchClass' => 'mdm\admin\models\searchs\User'
//                    'searchClass' => 'app\models\UserSearch'
                ],
            ],
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
//           '*',
            'user/*',
            'site/*',
//           'rbacadmin/*',
//           'gii/*',
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
        ]
    ],
    'components' => [
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'auth' => ['username' => 'elastic', 'password' => 'changeme'],
            'nodes' => [
                [
                    'http_address' => '127.0.0.1:9200',
                ]
// configure more hosts if you have a cluster
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => md5('TRHf456'),
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        Моя реализация
//        'user' => [
//            'identityClass' => 'app\models\MyUser',
//            'enableAutoLogin' => true,
//        ],
//        
//      Реализация mdmsoft/yii2-admin
        'user' => [
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['user/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
// send all mails to a file by default. You have to set
// 'useFileTransport' to false and configure a transport
// for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['api/cd' => 'api/cd'],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['api/book' => 'api/book'],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['api/product' => 'api/product'],
                ],
            ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
