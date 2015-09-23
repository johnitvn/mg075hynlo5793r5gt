<?php

return [
    'headerMenuItems' => [
        [
            'label' => Yii::t('app', 'Profile'),
            'url' => ['/profile/index'],
        ],
        [
            'label' => Yii::t('app', 'Change Password'),
            'url' => ['/profile/change-password'],
        ],
    ],
    'items' => [
        [
            'label' => Yii::t('app', 'Home'),
            'icon' => 'fa fa-home',
            'url' => ['site/index']
        ],
        [
            'label' => Yii::t('app', 'Employees'),
            'icon' => 'fa fa-users',
            'url' => ['employee/index'],
            'visible' => \Yii::$app->getUser()->can('read_employee')
        ],
        [
            'label' => Yii::t('app', 'Contacts'),
            'icon' => 'fa fa-book',
            'url' => ['contact/index'],
        ],
        [
            'label' => Yii::t('app', 'Film Categories'),
            'icon' => 'fa fa-tree',
            'url' => ['film-category/index'],
            'visible' => \Yii::$app->getUser()->can('read_film_category')
        ],
        [
            'label' => Yii::t('app', 'Film Actors'),
            'icon' => 'fa fa-star',
            'url' => ['film-actor/index'],
            'visible' => \Yii::$app->getUser()->can('read_film_actor')
        ],
        [
            'label' => Yii::t('app', 'Countries'),
            'icon' => 'fa fa-list',
            'url' => ['country/index'],
            'visible' => \Yii::$app->getUser()->can('read_country')
        ],
    ]
];
