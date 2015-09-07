<?php

namespace backend\assets;

use common\components\AssetBundleExt;

class ToastAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/toastr";
    public $css = [
        'toastr',
    ];
    public $js = [
        'toastr',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
