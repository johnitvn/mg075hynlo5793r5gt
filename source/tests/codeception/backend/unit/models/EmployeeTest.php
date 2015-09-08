<?php

namespace tests\codeception\backend\unit\models;

use tests\codeception\backend\_support\BaseModelTestCase;
use backend\models\Employee;
use yii\web\IdentityInterface;

/**
 * Description of MainlyAssetTest
 *
 * @author john
 */
class EmployeeTest extends BaseModelTestCase {

    public function __construct() {
        parent::__construct(Employee::className());
    }

    public function testImplementIdentityInterface() {
        $model = new Employee();
        expect($model instanceof IdentityInterface)->true();
    }

    public function testTableName() {
        expect(Employee::tableName())->equals("employee");
    }

}
