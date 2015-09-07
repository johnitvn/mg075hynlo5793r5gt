<?php

namespace backend\assets;

use common\components\AssetBundleExt;

class MainlyAsset extends AssetBundleExt {

    public $basePath = "@webroot";
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
        'backend\assets\MetisMenuAsset',
        'backend\assets\SlimScrollAsset',
        'backend\assets\AnimateAsset',
        'backend\assets\PaceAsset',
        'backend\assets\FontAwesomeAsset',
    ];

}
