<?php

namespace common\components;

use yii\web\AssetBundle as BaseAssetBundle;

class AssetBundleExt extends BaseAssetBundle {

    public function init() {
        parent::init();
        if (YII_ENV == YII_ENV_TEST || YII_ENV == YII_ENV_PROD) {
            $this->initForProdEnv();
        } else {
            $this->initForDevEnv();
        }
    }

    private function initForProdEnv() {
        $jsAray = [];
        foreach ($this->js as $js) {
            $jsAray[] = $js . '.min.js';
        }
        $this->js = $jsAray;

        $cssAray = [];
        foreach ($this->css as $css) {
            $cssAray[] = $css . '.min.css';
        }
        $this->css = $cssAray;
    }

    private function initForDevEnv() {
        $this->publishOptions['forceCopy'] = true;
        $jsAray = [];
        foreach ($this->js as $js) {
            $jsAray[] = $js . '.js';
        }
        $this->js = $jsAray;

        $cssAray = [];
        foreach ($this->css as $css) {
            $cssAray[] = $css . '.css';
        }
        $this->css = $cssAray;
    }

}
