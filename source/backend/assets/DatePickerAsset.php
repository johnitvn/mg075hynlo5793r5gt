<?php

namespace backend\assets;

use common\components\AssetBundleExt;

class DatePickerAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/bootstrap-datepicker/dist";
    public $css = [
        'css/bootstrap-datepicker3',
    ];
    public $js = [
        'js/bootstrap-datepicker',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
