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
            'label' => Yii::t('app', 'Sale Manage'),
            'icon' => 'fa fa-codepen',
            'url' => '#',
            'items' => [
                [
                    'label' => Yii::t('app', 'Home'),
                    'icon' => 'fa fa-home',
                    'url' => ['site/index']
                ],
                [
                    'label' => Yii::t('app', 'Manage'),
                    'icon' => 'fa fa-gear',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Employees'),
                            'icon' => 'fa fa-users',
                            'url' => ['employee/index'],
                        ],
                    ],
                ],
                [
                    'label' => Yii::t('app', 'Contacts'),
                    'icon' => 'fa fa-book',
                    'url' => ['contact/index'],
                ],
            ]
        ],
        [
            'label' => Yii::t('app', 'Website Manage'),
            'icon' => 'fa fa-globe',
            'url' => '#',
            'items' => [
                [
                    'label' => Yii::t('app', 'Home'),
                    'icon' => 'fa fa-home',
                    'url' => ['site/index']
                ],
            ]
        ],
    ]
];
