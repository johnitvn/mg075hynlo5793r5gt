<?php

namespace tests\codeception\backend\unit\widgets;

use backend\widgets\MenuHeader;
use tests\codeception\backend\unit\TestCase;

/**
 * @group widgets
 */
class MenuHeaderTest extends TestCase {

    protected function setUp() {
        parent::setUp();
        $this->mockApplication();
    }

    public function testRenderNoItems() {
        $output = MenuHeader::widget([
                    'items' => []
        ]);

        $expect = <<<HTML
<div class="dropdown profile-element">
<span>
<img class="img-circle" src="/img/avatar/48.jpg" alt="">
</span>
<a class="dropdown-toggle" href="#" data-toggle="dropdown">
<span class="clear">
<span class="block m-t-xs"><strong class="font-bold">Demo User</strong></span>
<span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
</span>
</a>
<ul class="dropdown-menu animated fadeInRight m-t-xs">
</ul>
</div>
HTML;

        $this->assertEquals(trim(preg_replace('/\s\s+/', '', $expect)), $output);
    }

    public function testRenderWithItems() {
        $output = MenuHeader::widget([
                    'items' => [['label'=>'test','url'=>'test']]
        ]);

        $expect = <<<HTML
<div class="dropdown profile-element">
<span>
<img class="img-circle" src="/img/avatar/48.jpg" alt="">
</span>
<a class="dropdown-toggle" href="#" data-toggle="dropdown">
<span class="clear">
<span class="block m-t-xs"><strong class="font-bold">Demo User</strong></span>
<span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
</span>
</a>
<ul class="dropdown-menu animated fadeInRight m-t-xs">
<li><a href="test">test</a></li>
</ul>
</div>
HTML;

        $this->assertEquals(trim(preg_replace('/\s\s+/', '', $expect)), $output);
    }

}
