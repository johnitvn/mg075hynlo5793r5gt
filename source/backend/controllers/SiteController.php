<?php

namespace backend\controllers;

use yii\web\Controller;
use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        } else if ($action->id == "error") {
            $this->layout = "middle_box";
        }
        return true;
    }

    public function actions() {
        return [
            'error' => [
                'class' => ErrorAction::className(),
            ]
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

}
