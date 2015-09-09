<?php

namespace tests\codeception\backend\_support;

use tests\codeception\backend\unit\TestCase;

/**
 * Description of BaseModelTestCase
 *
 * @author john
 */
class BaseModelTestCase extends TestCase {

    private $modelClassName;

    public function __construct($modelClassName) {
        $this->modelClassName = $modelClassName;
    }

    public function testTableNameReturn() {
        $tableName = call_user_func([$this->modelClassName, "tableName"]);
        expect(is_string($tableName))->true();
    }

    public function testRulesReturn() {
        $model = new $this->modelClassName;
        $rules = $model->rules();
        expect(is_array($rules))->true();
    }

    public function testAttributeLabelReturn() {
        $model = new $this->modelClassName;
        $labels = $model->attributeLabels();
        expect(is_array($labels))->true();
    }

    public function testAttributeLabelIsFully() {
        $model = new $this->modelClassName;
        $labels = $model->attributeLabels();
        expect(count($labels) === count($model->getAttributes()))->true();
    }

    public function testScenariosReturn() {
        $model = new $this->modelClassName;
        $scenarios = $model->scenarios();
        expect(is_array($scenarios))->true();
    }

    public function testBehaviorsReturn() {
        $model = new $this->modelClassName;
        $scenarios = $model->behaviors();
        expect(is_array($scenarios))->true();
    }

}
