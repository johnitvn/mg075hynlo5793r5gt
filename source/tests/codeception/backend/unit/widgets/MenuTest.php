<?php

namespace tests\codeception\backend\unit\widgets;

use tests\codeception\backend\unit\TestCase;
use backend\widgets\Menu;

/**
 * @group widgets
 */
class MenuTest extends TestCase {

    protected function setUp() {
        parent::setUp();
        $this->mockApplication();
    }

}
