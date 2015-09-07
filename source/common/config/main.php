<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailWorker' => [
            'class' => 'common\components\MailWoker',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'employee_auth_item',
            'itemChildTable' => 'employee_auth_item_child',
            'assignmentTable' => 'employee_auth_assignment',
            'ruleTable' => 'employee_auth_rule',
        ]
    ],
];
