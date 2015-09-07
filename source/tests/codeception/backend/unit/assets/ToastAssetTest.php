<?php

namespace tests\codeception\backend\unit\assets;

use tests\codeception\backend\_support\BaseAssetTestCase;

/**
 * Description of MainlyAssetTest
 *
 * @author john
 */
class ToastAssetTest extends BaseAssetTestCase {

    public function __construct() {
        parent::__construct(\backend\assets\ToastAsset::className());
    }

    protected function setUp() {
        parent::setUp();
    }

    protected function tearDown() {
        parent::tearDown();
    }

}
