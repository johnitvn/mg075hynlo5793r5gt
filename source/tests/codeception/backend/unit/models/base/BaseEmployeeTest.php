<?php

namespace tests\codeception\backend\unit\models\base;

use tests\codeception\backend\_support\BaseModelTestCase;
use backend\models\base\BaseEmployee;

/**
 * Description of MainlyAssetTest
 *
 * @author john
 */
class BaseEmployeeTest extends BaseModelTestCase {

    public function __construct() {
        parent::__construct(BaseEmployee::className());
    }

    public function testTableName() {
        expect(BaseEmployee::tableName())->equals("employee");
    }

}
