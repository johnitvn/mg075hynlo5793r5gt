<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
$security = Yii::$app->getSecurity();

$statusArr = [
    backend\models\base\Employee::STATUS_ACTIVED,
    backend\models\base\Employee::STATUS_BLOCKED,
    backend\models\base\Employee::STATUS_DELETED,
];

return [
    'fullname' => $faker->name,
    'username' => "demo$index",
    'status' => $statusArr[$index % 3],
    'gender' => $index % 2,
    'email' => $faker->email,
    'phone' => substr($faker->hexColor, 1) . substr($faker->hexColor, 1),
    'auth_key' => $security->generateRandomString(),
    'password_hash' => $security->generatePasswordHash('demo' . $index),
    'password_reset_token' => $security->generateRandomString() . '_' . time(),
    'created_at' => time(),
    'updated_at' => time(),
];

