<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'user' => [
            'identityClass' => 'backend\models\Employee',
            'enableAutoLogin' => true,
            'loginUrl' => ['/sign/in']
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
        'google-client' => [
            'class' => 'backend\components\GoogleClient',
            'serviceAccountEmail' => '84027832130-d0fhqd4r52lf96gv1tmp6dqjium7ieo7@developer.gserviceaccount.com',
            'keyFile' => "@backend/config/google-client-key.p12",
            'appName' => 'Phim365',
            'scopes' => [
                // \Google_Service_Analytics::ANALYTICS_READONLY,
                "https://www.googleapis.com/auth/analytics.readonly",
            ]
        ],
        'google-analytics' => [
            'class' => 'backend\components\GoogleAnalyticsService',
            'viewId' => '95454412'
        ]
    ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'actions' => ['in', 'error', 'toolbar'],
                'allow' => true,
            ],
            [

                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
    'params' => $params,
];
