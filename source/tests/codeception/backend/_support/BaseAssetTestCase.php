<?php

namespace tests\codeception\backend\_support;

use tests\codeception\backend\unit\TestCase;

/**
 * Description of AssetTestCase
 *
 * @author john
 */
class BaseAssetTestCase extends TestCase {

    use \Codeception\Specify;

    /**
     *
     * @var string
     */
    private $testAssetBundleClass;

    /**
     *
     * @var \yii\web\AssetBundle
     */
    protected $testAssetBundle;

    public function __construct($testAssetBundleClass) {
        $this->testAssetBundleClass = $testAssetBundleClass;
    }

    protected function setUp() {
        parent::setUp();
        $this->testAssetBundle = new $this->testAssetBundleClass;
    }

    public function testAssetBundleVariableType() {
        $this->specify('$css must is array', function() {
            expect('$css must is array', is_array($this->testAssetBundle->css))->true();
        });

        $this->specify('$js must is array', function() {
            expect('$js must is array', is_array($this->testAssetBundle->js))->true();
        });

        $this->specify('$depends must is array', function() {
            expect('$depends must is array', is_array($this->testAssetBundle->depends))->true();
        });

        $this->specify('$jsOptions must is array', function() {
            expect('$jsOptions must is array ', is_array($this->testAssetBundle->jsOptions))->true();
        });

        $this->specify('$cssOptions must is array', function() {
            expect('$cssOptions must is array', is_array($this->testAssetBundle->cssOptions))->true();
        });

        $this->specify('$sourcePath must exist', function() {
            if ($this->testAssetBundle->sourcePath !== null) {
                expect('$sourcePath must exist', file_exists($this->testAssetBundle->sourcePath))->true();
            }
        });

        $this->specify('all depend bundles must is exist', function() {
            foreach ($this->testAssetBundle->depends as $dependBundle) {
                expect("class must is exist", class_exists($dependBundle))->true();
            }
        });
    }

}
