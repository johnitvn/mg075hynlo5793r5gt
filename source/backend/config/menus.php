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
                    'label' => Yii::t('app', 'Contacts'),
                    'icon' => 'fa fa-book',
                    'url' => ['contact/index'],
                ],
                [
                    'label' => Yii::t('app', 'Danh mục'),
                    'icon' => 'fa fa-tags',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Goods Category'),
                            'icon' => 'fa fa-tag',
                            'url' => ['receipt-voucher/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Goods'),
                            'icon' => 'fa fa-cubes',
                            'url' => ['payment-voucher/index'],
                        ],
                    ],
                ],
                [
                    'label' => Yii::t('app', 'Chứng từ'),
                    'icon' => 'fa fa-folder-open',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Receipt Voucher'),
                            'icon' => 'fa fa-sticky-note',
                            'url' => ['receipt-voucher/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Payment Voucher'),
                            'icon' => 'fa fa-sticky-note',
                            'url' => ['payment-voucher/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Goods Received'),
                            'icon' => 'fa fa-sticky-note',
                            'url' => ['goods-received/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Goods Dispathched'),
                            'icon' => 'fa fa-sticky-note',
                            'url' => ['goods-dispathched/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Goods Transfer'),
                            'icon' => 'fa fa-sticky-note',
                            'url' => ['goods-transfer/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Phiếu nhập lại'),
                            'icon' => 'fa fa-sticky-note',
                            'url' => ['goods-transfer/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Phiếu xuất lại'),
                            'icon' => 'fa fa-sticky-note',
                            'url' => ['goods-transfer/index'],
                        ],
                    ],
                ],
                [
                    'label' => Yii::t('app', 'Báo cáo'),
                    'icon' => 'fa fa-bar-chart',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Sổ quỹ tiền mặt'),
                            'icon' => 'fa fa-money',
                            'url' => ['receipt-voucher/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Công nợ'),
                            'icon' => 'fa fa-table',
                            'url' => ['receipt-voucher/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Xuất nhập tồn'),
                            'icon' => 'fa fa-cubes',
                            'url' => ['payment-voucher/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Doanh số, doanh thu, lợi nhuận'),
                            'icon' => 'fa fa-pie-chart',
                            'url' => ['goods-received/index'],
                        ],
                    ],
                ],
                [
                    'label' => Yii::t('app', 'Manage'),
                    'icon' => 'fa fa-gear',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Agents'),
                            'icon' => 'fa fa-users',
                            'url' => ['agent/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Employees'),
                            'icon' => 'fa fa-users',
                            'url' => ['employee/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Provider'),
                            'icon' => 'fa fa-users',
                            'url' => ['provider/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Customers'),
                            'icon' => 'fa fa-users',
                            'url' => ['customer/index'],
                        ],
                    ],
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
                [
                    'label' => Yii::t('app', 'Informations'),
                    'icon' => 'fa fa-globe',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Articles'),
                            'icon' => 'fa fa-home',
                            'url' => ['sisadff']
                        ],
                        [
                            'label' => Yii::t('app', 'Categories'),
                            'icon' => 'fa fa-home',
                            'url' => ['sitsadfa']
                        ],
                    ]
                ],
                [
                    'label' => Yii::t('app', 'Feedback'),
                    'icon' => 'fa fa-globe',
                    'url' => '#',
                ],
            ]
        ],
        [
            'label' => Yii::t('app', 'Documents'),
            'icon' => 'fa fa-book',
            'url' => ['app-document/index'],
        ],
    ]
];
