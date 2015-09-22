<?php

namespace backend\assets;

use common\components\AssetBundleExt;

class AppAsset extends AssetBundleExt {

    public $sourcePath = "@backend/resources";
    public $baseUrl = "@web";
    public $css = [
        'css/style'
    ];
    public $js = [
        'js/app',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'backend\assets\shared\MetisMenuAsset',
        'backend\assets\shared\SlimScrollAsset',
        //'backend\assets\shared\AnimateAsset',
        //'backend\assets\shared\PaceAsset',
        'backend\assets\shared\FontAwesomeAsset',
    ];

}
