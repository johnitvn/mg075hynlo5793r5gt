<?php

namespace tests\codeception\backend\unit\widgets;

use Yii;
use backend\widgets\MenuHeader;
use tests\codeception\backend\unit\DbTestCase;
use backend\models\Employee;
use tests\codeception\backend\fixtures\EmployeeFixture;

/**
 * @group widgets
 */
class MenuHeaderTest extends DbTestCase {

    protected function setUp() {
        parent::setUp();
        Yii::configure(Yii::$app, [
            'components' => [
                'user' => [
                    'class' => 'yii\web\User',
                    'identityClass' => 'common\models\User',
                ],
            ],
        ]);
        Yii::$app->getUser()->login(Employee::findByUsername('demo0'));
    }

    protected function tearDown() {
        parent::tearDown();
        Yii::$app->getUser()->logout();
    }

    public function testRenderNoItems() {
        $output = MenuHeader::widget([
                    'items' => []
        ]);

        $expect = <<<HTML
<div class="dropdown profile-element">
<span>
<img class="img-circle" src="/img/default-avatar/48.jpg" alt="">
</span>
<a class="dropdown-toggle" href="#" data-toggle="dropdown">
<span class="clear">
<span class="block m-t-xs"><strong class="font-bold">Everett McGlynn</strong></span>
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
                    'items' => [['label' => 'test', 'url' => 'test']]
        ]);

        $expect = <<<HTML
<div class="dropdown profile-element">
<span>
<img class="img-circle" src="/img/default-avatar/48.jpg" alt="">
</span>
<a class="dropdown-toggle" href="#" data-toggle="dropdown">
<span class="clear">
<span class="block m-t-xs"><strong class="font-bold">Everett McGlynn</strong></span>
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

    /**
     * @inheritdoc
     */
    public function fixtures() {
        return [
            'user' => [
                'class' => EmployeeFixture::className(),
                'dataFile' => '@tests/codeception/backend/fixtures/data/employee.php'
            ],
        ];
    }

}
