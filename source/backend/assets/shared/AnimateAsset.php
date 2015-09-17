<?php

namespace backend\assets\shared;

use common\components\AssetBundleExt;

class AnimateAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/animate.css";
    public $css = [
        'animate',
    ];
    public $js = [
    ];
    public $depends = [
    ];

}
