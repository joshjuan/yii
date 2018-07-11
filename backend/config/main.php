<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
           // 'enableAutoLogin' => false,
           // 'enableSession' => true,
           // 'authTimeout' => 300, //5 minutes
            //'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            //'class' => 'yii\web\Session',
            //'timeout' => 300,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
           // 'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [
              ['class' => 'yii\rest\UrlRule', 'controller' => 'api', 'pluralize'=>false], // 'pluralize'=>false for working at CURL
            ],
        ],


    ],
    'params' => $params,
];
