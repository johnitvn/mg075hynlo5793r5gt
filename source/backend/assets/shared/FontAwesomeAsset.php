<?php

namespace backend\assets\shared;

use common\components\AssetBundleExt;

class FontAwesomeAsset extends AssetBundleExt {

    public $sourcePath = "@vendor/bower/font-awesome";
    public $css = [
        'css/font-awesome',
    ];
    public $js = [
    ];
    public $depends = [
    ];

}
