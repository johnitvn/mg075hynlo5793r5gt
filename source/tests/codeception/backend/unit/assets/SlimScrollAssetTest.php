<?php

namespace tests\codeception\backend\unit\assets;

use tests\codeception\backend\_support\BaseAssetTestCase;

/**
 * Description of MainlyAssetTest
 *
 * @author john
 */
class SlimScrollAssetTest extends BaseAssetTestCase {

    public function __construct() {
        parent::__construct(\backend\assets\SlimScrollAsset::className());
    }

    protected function setUp() {
        parent::setUp();
    }

    protected function tearDown() {
        parent::tearDown();
    }

}
