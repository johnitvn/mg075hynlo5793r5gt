<?php

namespace backend\assets;

use common\components\AssetBundleExt;

class PaceAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/pace";
    public $css = [
        'themes/blue/pace-theme-minimal'
    ];
    public $js = [
        'pace',
    ];
    public $depends = [
    ];

}
