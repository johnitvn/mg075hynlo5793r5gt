<?php

namespace tests\codeception\common\unit\components;

use tests\codeception\backend\unit\TestCase;
use common\components\AssetBundleExt;
use ReflectionMethod;

class AssetBundleExtTest extends TestCase {

    use \Codeception\Specify;

    public function testInitializeForProductionEnviroment() {
        $asset = new AssetBundleExt();

        $asset->js = [
            'test-js'
        ];
        $asset->css = [
            'test-css'
        ];

        $this->invokeMethod($asset, 'initForProdEnv');


        expect(is_array($asset->js))->true();
        expect(count($asset->js) == 1)->true();
        expect(substr($asset->js[0], strlen($asset->js[0]) - 7) == ".min.js")->true();


        expect(is_array($asset->css))->true();
        expect(count($asset->css) == 1)->true();
        expect(substr($asset->css[0], strlen($asset->css[0]) - 8) == ".min.css")->true();

        expect(count($asset->publishOptions) == 0)->true();
    }

    public function testInitializeForDevelopmentnEnviroment() {
        $asset = new AssetBundleExt();

        $asset->js = [
            'test-js'
        ];
        $asset->css = [
            'test-css'
        ];

        $this->invokeMethod($asset, 'initForDevEnv');

        expect(is_array($asset->js))->true();
        expect(count($asset->js) == 1)->true();
        expect(substr($asset->js[0], strlen($asset->js[0]) - 3) == ".js")->true();
        expect(substr($asset->js[0], strlen($asset->js[0]) - 7) !== ".min.js")->true();


        expect(is_array($asset->css))->true();
        expect(count($asset->css) == 1)->true();
        expect(substr($asset->css[0], strlen($asset->css[0]) - 4) == ".css")->true();
        expect(substr($asset->css[0], strlen($asset->css[0]) - 8) !== ".min.css")->true();


        expect(count($asset->publishOptions) == 1)->true();
        expect($asset->publishOptions['forceCopy'])->true();
    }

    private function invokeMethod($object, $methodName, $params = []) {
        $method = new ReflectionMethod(
                AssetBundleExt::className(), $methodName
        );
        $method->setAccessible(true);
        return $method->invoke($object, $params);
    }

}
