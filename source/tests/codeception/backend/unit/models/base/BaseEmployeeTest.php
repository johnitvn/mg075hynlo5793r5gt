<?php

namespace tests\codeception\backend\unit\models\base;

use tests\codeception\backend\_support\BaseModelTestCase;
use backend\models\base\Employee;

/**
 * Description of MainlyAssetTest
 *
 * @author john
 */
class BaseEmployeeTest extends BaseModelTestCase {

    public function __construct() {
        parent::__construct(Employee::className());
    }

    public function testTableName() {
        expect(Employee::tableName())->equals("employee");
    }

}
