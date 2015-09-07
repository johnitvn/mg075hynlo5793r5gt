<?php

namespace tests\codeception\config\faker;

use yii\faker\FixtureController as BaseController;

class FixtureCommonController extends BaseController {

    /**
     * @var string Alias to the template path, where all tables templates are stored.
     */
    public $templatePath = '@tests/codeception/common/templates/fixtures';

    /**
     * @var string Alias to the fixture data path, where data files should be written.
     */
    public $fixtureDataPath = '@tests/codeception/common/fixtures/data';

    /**
     * @var string default namespace to search fixtures in
     */
    public $namespace = 'tests\codeception\common\fixtures';

}
