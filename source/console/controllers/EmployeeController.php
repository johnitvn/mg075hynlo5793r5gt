<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use backend\models\Employee;

/**
 * Manager Employee
 *
 * @author john
 */
class EmployeeController extends Controller {

    const EMAIL_REGEX = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';

    /**
     * dd/mm/YY
     */
    const DATE_REGEX = '/(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d/';

    /**
     * Create employee account
     */
    public function actionCreate() {
        $model = new Employee([
            'scenario' => 'create'
        ]);

        $this->stdout("\nPlease type all infomation of employee\n");
        $this->stdout("Field marked with (*) is required\n");
        $this->stdout("All field left you can live empty for default\n");
        $info = $this->promptEmployeeinfo($model);
        Yii::configure($model, $info);

        if (!$model->validate()) {
            echo "\nHave something wrong. Please fix all folowing bellow:\n";
            $this->printErrors($model);
            echo "\n";
            exit();
        } else if (!$model->save()) {
            echo "\nHave something wrong. Please fix all folowing bellow:\n";
            exit();
        } else {
            echo "\nEmployee have been create success!!!\n";
        }
    }

    private function promptEmployeeinfo($model) {
        $info = [];
        $info['fullname'] = $this->prompt($model->getAttributeLabel('fullname') . " (*) :", [ 'required' => true]);
        $info['username'] = $this->prompt($model->getAttributeLabel('username') . " (*) :", [ 'required' => true, 'pattern' => \backend\models\base\Employee::USERNAME_REGEXP]);
        $info['email'] = $this->prompt($model->getAttributeLabel('email') . " (*) :", [ 'required' => true, 'pattern' => self::EMAIL_REGEX]);
        $info['password'] = $this->prompt($model->getAttributeLabel('password') . "(*):", [ 'required' => true]);
        $info['confirm_password'] = $this->prompt($model->getAttributeLabel('confirm_password') . "(*):", [ 'required' => true]);
        return $info;
    }

    private function printErrors($model) {
        foreach ($model->getErrors() as $field => $errors) {
            $this->stdout(" - " . $model->getAttributeLabel($field) . "\n");
            foreach ($errors as $msg) {
                $this->stdout("     - $msg\n");
            }
        }
    }

}
