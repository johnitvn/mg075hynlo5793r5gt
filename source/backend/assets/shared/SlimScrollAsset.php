<?php

namespace backend\assets\shared;

use common\components\AssetBundleExt;

class SlimScrollAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/slimscroll";
    public $css = [
    ];
    public $js = [
        'jquery.slimscroll',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
