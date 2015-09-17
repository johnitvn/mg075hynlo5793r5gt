<?php

use kartik\datecontrol\Module as DateControlModule;

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'backend',
    'language' => 'vi',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'datecontrol' => [
            'class' => DateControlModule::className(),
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                DateControlModule::FORMAT_DATE => 'dd-MM-yyyy',
                DateControlModule::FORMAT_TIME => 'HH:mm:ss a',
                DateControlModule::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss a',
            ],
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                DateControlModule::FORMAT_DATE => 'php:U', // saves as unix timestamp
                DateControlModule::FORMAT_TIME => 'php:U',
                DateControlModule::FORMAT_DATETIME => 'php:U',
            ],
            // set your display timezone
            'displayTimezone' => 'Asia/Ho_Chi_Minh',
            // set your timezone for date saved to db
            'saveTimezone' => 'UTC',
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
            // use ajax conversion for processing dates from display format to save format.
            'ajaxConversion' => true,
            // default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                DateControlModule::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
                DateControlModule::FORMAT_DATETIME => [], // setup if needed
                DateControlModule::FORMAT_TIME => [], // setup if needed
            ],
            // custom widget settings that will be used to render the date input instead of kartik\widgets,
            // this will be used when autoWidget is set to false at module or widget level.
            'widgetSettings' => [
                DateControlModule::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker', // example
                    'options' => [
                        'dateFormat' => 'php:d-M-Y',
                        'options' => ['class' => 'form-control'],
                    ]
                ]
            ]
        // other settings
        ]
    ],
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
