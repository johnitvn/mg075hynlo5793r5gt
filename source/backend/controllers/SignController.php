<?php

namespace backend\controllers;

use yii\web\Controller;

/**
 * Sign controller
 */
class SignController extends Controller {

    public function actionIn() {
        
    }

    public function actionOut() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
