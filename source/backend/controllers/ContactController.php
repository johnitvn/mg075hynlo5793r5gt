<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\Employee;

/**
 * Site controller
 */
class ContactController extends Controller {

    public function actionIndex($q = null) {
        $query = Employee::find();
        $query->where(['status' => Employee::STATUS_ACTIVE]);
        if ($q != null) {
            $query->andFilterWhere(['like', 'username', $q]);
            $query->andFilterWhere([ 'like', 'fullname', $q]);
            $query->andFilterWhere([ 'like', 'email', $q]);
        }
        return $this->render('index', [
                    'models' => $query->all(),
        ]);
    }

}
