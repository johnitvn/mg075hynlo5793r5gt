<?php

namespace backend\assets;

use common\components\AssetBundleExt;

class MetisMenuAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/metisMenu/dist";
    public $css = [
        'metisMenu',
    ];
    public $js = [
        'metisMenu',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
