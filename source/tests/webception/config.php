<?php

return [
    'sites' => [
        'Backend' => YII_APP_TEST_PATH . '/codeception/backend/codeception.yml',
        'Common' => YII_APP_TEST_PATH . '/codeception/common/codeception.yml',
        'Console' => YII_APP_TEST_PATH . '/codeception/console/codeception.yml',
    ],
    'run_php' => TRUE,
    'executable' => YII_APP_TEST_PATH . '/bin/codecept.phar',
    'tests' => [
        'acceptance' => TRUE,
        'functional' => TRUE,
        'unit' => TRUE,
    ],
    'ignore' => [
        'acceptance' => [
            '_bootstrap.php',
        ],
        'functional' => [
            '_bootstrap.php',
        ],
        'unit' => [
            '_bootstrap.php',
            'DbTestCase.php',
            'TestCase.php',
        ],
    ],
    'location' => __FILE__,
    'DS' => DIRECTORY_SEPARATOR,
    'debug' => FALSE,
    'steps' => TRUE,
];
