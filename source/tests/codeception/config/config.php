<?php

/**
 * Application configuration shared by all applications and test types
 */
return [
    'language' => 'en-US',
    'controllerMap' => [
        'fixture' => 'tests\codeception\config\faker\FixtureController',
        'fixture-common' => 'tests\codeception\config\faker\FixtureCommonController',
        'fixture-console' => 'tests\codeception\config\faker\FixtureConsoleController',
        'fixture-backend' => 'tests\codeception\config\faker\FixtureBackendController',
        'fixture-frontend' => 'tests\codeception\config\faker\FixtureFrontendController',
    ],
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=127.0.0.1;dbname=ems-test',
            'username' => 'root',
            'password' => 'root',
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
