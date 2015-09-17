<?php

namespace backend\assets;

use common\components\AssetBundleExt;

class ICheckAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/icheck";
    public $css = [
        'skins/flat/blue',
    ];
    public $js = [
        'icheck',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
